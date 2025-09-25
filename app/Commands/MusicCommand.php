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
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Console\Prohibitable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Log\Context\Repository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Concurrency;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use LaravelZero\Framework\Commands\Command;
use SebastianBergmann\Timer\ResourceUsageFormatter;
use SebastianBergmann\Timer\Timer;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function Illuminate\Filesystem\join_paths;
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
    use ConfirmableTrait;
    use Hydrator;
    use LockableTrait;
    use Prohibitable;
    use Rescuer;
    protected $signature = <<<'SIGNATURE'
        music
        {keyword? : Search keyword for music}
        {--b|break : Specify whether to break after download}
        {--d|directory= : Specify the download directory}
        {--D|driver= : Specify the search driver(sync、fork、process)}
        {--l|locale=zh_CN : Specify the locale language}
        {--p|page=1 : Specify the page number}
        {--P|per-page=30 : Specify the per page number}
        {--s|sources=* : Specify the music sources(tencent、netease、kugou)}
        SIGNATURE;
    protected $description = 'Search and download music';
    private MusicContract $music;

    /**
     * @noinspection PhpVoidFunctionResultUsedInspection
     * @noinspection PhpStaticAsDynamicMethodCallInspection
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle(): void
    {
        collect()
            ->unless($this->option('sources'), fn (): null => $this->input->setOption('sources', (array) select(
                __('select_source_label'),
                array_combine($sources = config('app.sources'), array_map(ucfirst(...), $sources)),
                Arr::first($sources),
            )))
            ->when(windows_os(), static fn (): null => warning(__('windows_hint')))
            ->when(blank($this->argument('keyword')), fn (): null => $this->input->setArgument(
                'keyword',
                str(text(
                    __('keyword_label'),
                    __('keyword_placeholder'),
                    Context::missing('keyword') ? __('keyword_default') : '',
                    __('keyword_label')
                ))->trim()->toString()
            ))
            ->tap(fn (): Repository => Context::add('keyword', $this->argument('keyword')))
            ->pipe(fn (): Collection => spin(
                function (): Collection {
                    /** @noinspection PhpVoidFunctionResultUsedInspection */
                    $timer = tap(new Timer)->start();
                    $songs = $this->music->search($this->argument('keyword'), [
                        'sources' => $this->option('sources'),
                        // 'type' => $this->option('type'),
                        'page' => $this->option('page'),
                        'limit' => $this->option('per-page'),
                    ]);
                    Context::add('duration', $timer->stop());

                    return $songs;
                },
                __('searching_hint', ['keyword' => $this->argument('keyword')]),
            ))
            ->whenEmpty(function (): void {
                warning(__('empty_hint')); // @codeCoverageIgnore
                $this->reHandle(); // @codeCoverageIgnore
            })
            ->tap(function (Collection $songs): void {
                table(__('table_header'), $this->sanitizes($songs, $this->argument('keyword')));
                info((new ResourceUsageFormatter)->resourceUsage(Context::get('duration')));
            })
            ->tap(fn (): bool => confirm(__('confirm_label')) or $this->reHandle())
            ->pipe(
                fn (Collection $songs): Collection => (
                    $selectedKeys = $this
                        ->hydrates($songs, $this->argument('keyword'))
                        ->pipe(
                            static fn (Collection $options): Collection => collect(multiselect(
                                __('select_label'),
                                $options->all(),
                                [/* $options->first() */],
                                20,
                                __('select_label'),
                                hint: __('select_hint'),
                            ))->map(static fn (string $selectedValue): false|int => $options->search($selectedValue, true))
                        )
                )->containsStrict(0) ? $songs : $songs->only($selectedKeys->all())
            )
            ->each(fn (array $song): ?\Throwable => $this->rescue(fn (): null => $this->music->download(
                $song['url'],
                Utils::savedPathFor($song, $this->option('directory'))
            )))
            ->tap(fn (): ?\Throwable => $this->rescue(fn (): null => $this->notify(
                config('app.name'),
                __('download_completed'),
                windows_os() ? null : resource_path(join_paths('images', 'notify-icon.png'))
            )))
            ->unless($this->option('break'), fn (): null => $this->reHandle());
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
     * @noinspection NestedTernaryOperatorInspection
     */
    #[\Override]
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        info(config('app.logo'));

        validator($this->arguments() + $this->options(), $this->rules())->validate();

        config()->set('app.locale', $this->option('locale'));

        $this->input->setOption('driver', $driver = $this->option('driver') ?: (\extension_loaded('pcntl') ? 'fork' : 'sync'));
        $this->music = Music::setDriver(Concurrency::driver($driver));

        $this->input->setOption('directory', $this->option('directory') ?: $defaultDirectory = Utils::defaultSavedDirectory());
        isset($defaultDirectory) and File::ensureDirectoryExists($defaultDirectory);
    }

    private function rules(): array
    {
        return [
            'keyword' => 'nullable|string',
            'directory' => [
                'nullable',
                'string',
                static function (string $attribute, mixed $value, \Closure $fail): void {
                    if (!File::isDirectory($value) || !File::isWritable($value)) {
                        $fail('validation.directory')->translate();
                    }
                },
            ],
            'driver' => 'nullable|string|in:sync,fork,process',
            'locale' => 'required|string',
            'page' => 'required|integer|between:1,100',
            'per-page' => 'required|integer|between:1,100',
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

    /**
     * @codeCoverageIgnore
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function reHandle(array $arguments = []): void
    {
        /**
         * @see \Illuminate\Console\Concerns\CallsCommands::runCommand()
         * @see \Illuminate\Console\Application::call()
         * @see \Symfony\Component\Console\Command\Command::run()
         * @see \Symfony\Component\Console\Application::doRun()
         */
        $input = tap(
            $this->createInputFromArguments($arguments += [
                'keyword' => null,
                // '--sources' => [],
            ]),
            fn (ArrayInput $input): null => $input->bind($this->getDefinition())
        );

        foreach ($input->getArguments() as $name => $value) {
            \array_key_exists($name, $arguments) and $this->input->setArgument($name, $value);
        }

        foreach ($input->getOptions() as $name => $value) {
            \array_key_exists("--$name", $arguments) and $this->input->setOption($name, $value);
        }

        $this->handle();
    }
}
