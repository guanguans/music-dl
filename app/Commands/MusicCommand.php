<?php

/** @noinspection PhpMissingParentCallCommonInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Commands;

use App\Concerns\Hydrator;
use App\Concerns\Rescuer;
use App\Contracts\Music as MusicContract;
use App\Facades\Music;
use App\Support\Utils;
use Cerbero\CommandValidator\ValidatesInput;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use LaravelZero\Framework\Commands\Command;
use SebastianBergmann\Timer\ResourceUsageFormatter;
use SebastianBergmann\Timer\Timer;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\select;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

final class MusicCommand extends Command implements Isolatable, PromptsForMissingInput
{
    use Hydrator;
    use LockableTrait;
    use Rescuer;
    use ValidatesInput;
    protected $signature = <<<'SIGNATURE'
        music
        {keyword? : Search keyword for music}
        {--b|break : Specify whether to break after download}
        {--d|directory= : Specify the download directory}
        {--D|driver=sync : Specify the search driver(sync、fork、process)}
        {--l|locale=zh_CN : Specify the locale language}
        {--s|sources=* : Specify the music sources(tencent、netease、kugou)}
        SIGNATURE;
    protected $description = 'Search and download music';
    private MusicContract $music;

    /**
     * @noinspection PhpVoidFunctionResultUsedInspection
     * @noinspection PhpUndefinedMethodInspection
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle(): void
    {
        collect()
            ->when(windows_os(), static fn () => warning(__('windows_hint')))
            ->tap(static function () use (&$stdinKeyword): void {
                /** @noinspection OffsetOperationsInspection */
                if (($fstat = fstat(\STDIN)) && 0 < $fstat['size']) {
                    $stdinKeyword = trim(stream_get_contents(\STDIN)); // @codeCoverageIgnore
                    fclose(\STDIN); // @codeCoverageIgnore
                }
            })
            ->tap(function () use (&$keyword, $stdinKeyword): void {
                $keyword = str($stdinKeyword ?: $this->argument('keyword') ?? text(
                    __('keyword_label'),
                    __('keyword_placeholder'),
                    $this->laravel->has('keyword') ? '' : __('keyword_default'),
                    __('keyword_label')
                ))->trim()->toString();
                $this->laravel->instance('keyword', $keyword);
            })
            ->pipe(function () use ($keyword, &$duration): Collection {
                return spin(
                    function () use ($keyword, &$duration): Collection {
                        /** @noinspection PhpVoidFunctionResultUsedInspection */
                        $timer = tap(new Timer)->start();
                        $songs = $this->music->search($keyword, $this->option('sources'));
                        $duration = $timer->stop();

                        return $songs;
                    },
                    __('searching_hint', ['keyword' => $keyword]),
                );
            })
            ->whenEmpty(function (): void {
                warning(__('empty_hint')); // @codeCoverageIgnore
                $this->handle(); // @codeCoverageIgnore
            })
            ->tap(function (Collection $songs) use ($keyword, $duration): void {
                table(__('table_header'), $this->sanitizes($songs, $keyword));
                info((new ResourceUsageFormatter)->resourceUsage($duration));
            })
            ->tap(fn (): bool => confirm(__('confirm_label')) or $this->handle())
            ->tap(function (Collection $songs) use (&$selectedKeys, $keyword): void {
                $selectedKeys = $this
                    ->hydrates($songs, $keyword)
                    ->pipe(static fn (Collection $options): Collection => collect(multiselect(
                        __('select_label'),
                        $options->all(),
                        [$options->first()],
                        20,
                        __('select_label'),
                        hint: __('select_hint'),
                    ))->map(static fn (string $selectedValue) => $options->search($selectedValue)));
            })
            ->pipe(
                static fn (Collection $songs): Collection => \in_array(0, $selectedKeys->all(), true)
                    ? $songs : $songs->only($selectedKeys->all())
            )
            ->each(fn (array $song): mixed => $this->rescue(fn () => $this->music->download(
                $song['url'],
                Utils::savedPathFor($song, $this->option('directory'))
            )))
            ->tap(fn (): mixed => $this->rescue(fn () => $this->notify(
                config('app.name'),
                $this->option('directory'),
                resource_path('images/notify-icon.png')
            )))
            ->unless($this->option('break'), fn (): null => $this->handle());
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(self::class)->everyMinute();
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        info(config('app.logo'));

        $this->option('driver') and config()->set('concurrency.default', $this->option('driver'));
        $this->option('locale') and config()->set('app.locale', $this->option('locale'));

        // $this->input->setOption('sources', array_filter($this->option('sources')) ?: config('app.sources'));
        $this->input->setOption('directory', $this->option('directory') ?: Utils::defaultSavedDirectory());
        File::ensureDirectoryExists($this->option('directory'));

        $this->music = Music::getFacadeRoot();
    }

    protected function rules(): array
    {
        return [
            'keyword' => 'nullable|string',
            'directory' => 'nullable|string',
            'driver' => 'required|string|in:sync,fork,process',
            'locale' => 'required|string',
            'sources' => 'list',
            'sources.*' => [
                'required',
                'string',
                'distinct',
                Rule::in(config('app.sources')),
            ],
            'configuration' => 'list',
            'configuration.*' => [
                'required',
                'string',
                'distinct',
            ],
        ];
    }

    #[\Override]
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        parent::interact($input, $output);
        $this->afterPromptingForMissingArguments($input, $output);
    }

    #[\Override]
    protected function afterPromptingForMissingArguments(InputInterface $input, OutputInterface $output): void
    {
        if (empty($this->option('sources'))) {
            $input->setOption('sources', (array) select(
                __('select_source_label'),
                array_combine($sources = config('app.sources'), array_map(ucfirst(...), $sources))
            ));
        }
    }
}
