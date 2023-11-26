<?php

/** @noinspection PhpMissingParentCallCommonInspection */

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Commands;

use App\Concerns\Hydrator;
use App\Contracts\Music;
use App\Support\Utils;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Laravel\Prompts;
use LaravelZero\Framework\Commands\Command;
use SebastianBergmann\Timer\ResourceUsageFormatter;
use SebastianBergmann\Timer\Timer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\error;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

final class MusicCommand extends Command
{
    use Hydrator;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'music
        {keyword? : Search keyword for music}
        {--driver=sequence : Specify the search driver(fork、sequence)}
        {--d|dir= : Specify the download directory}
        {--no-continue : Specify whether to recall the command after the download is complete}
        {--sources=* : Specify the music sources(tencent、netease、kugou)}
    ';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Search and download music';

    private array $config;

    private Music $music;

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        return collect()
            ->when(! $this->laravel->has('outputted_logo'), function (): void {
                Prompts\info($this->config['logo']);
                $this->laravel->instance('outputted_logo', true);
            })
            ->when(windows_os(), fn () => warning($this->config['windows_hint']))
            ->tap(function () use (&$keyword): void {
                $keyword = str($this->argument('keyword') ?? text(
                    $this->config['keyword_label'],
                    $this->config['keyword_placeholder'],
                    $this->config['keyword_default'],
                    $this->config['keyword_label']
                ))->trim()->toString();
            })
            ->pipe(function () use ($keyword, &$duration): Collection {
                return spin(
                    function () use ($keyword, &$duration): Collection {
                        /** @noinspection PhpVoidFunctionResultUsedInspection */
                        $timer = tap(new Timer())->start();
                        $songs = $this->music->search($keyword, $this->option('sources'));
                        $duration = $timer->stop();

                        return $songs;
                    },
                    $this->config['searching_hint']
                );
            })
            ->whenEmpty(function (): void {
                warning($this->config['empty_hint']);
                $this->handle();
            })
            ->tap(function (Collection $songs) use ($keyword, $duration): void {
                table($this->config['table_header'], $this->sanitizes($songs, $keyword));
                Prompts\info((new ResourceUsageFormatter())->resourceUsage($duration));
            })
            ->tap(fn (): bool => confirm($this->config['confirm_label']) or $this->handle())
            ->tap(function (Collection $songs) use (&$selectedKeys, $keyword): void {
                $selectedKeys = $this
                    ->hydrates($songs, $keyword)
                    ->pipe(fn (Collection $options): Collection => collect(multiselect(
                        $this->config['select_label'],
                        $options->all(),
                        [$options->first()],
                        20,
                        $this->config['select_label'],
                        hint: $this->config['select_hint'],
                    ))->map(static fn (string $selectedValue) => $options->search($selectedValue)));
            })
            ->pipe(
                static fn (Collection $songs): Collection => \in_array(0, $selectedKeys->all(), true)
                    ? $songs : $songs->only($selectedKeys->all())
            )
            ->each(fn (array $song): mixed => $this->wrappedExceptionHandler(fn () => $this->music->download(
                $song['url'],
                Utils::getSavePath($song, $this->option('dir'))
            )))
            ->tap(fn (): mixed => $this->wrappedExceptionHandler(fn () => $this->notify(
                config('app.name'),
                $this->option('dir'),
                resource_path('notify-icon.png')
            )))
            ->when(! $this->option('no-continue'), fn (): int => $this->handle())
            ->pipe(static fn (): int => self::SUCCESS);
    }

    /**
     * Define the command's schedule.
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->config = config('music-dl');
        $this->music = \App\Facades\Music::driver($this->option('driver'));
        $this->input->setOption('dir', $this->option('dir') ?: Utils::getDefaultSaveDir());
        File::ensureDirectoryExists($this->option('dir'));
        $this->input->setOption('sources', array_filter((array) $this->option('sources')) ?: $this->config['sources']);
    }

    /**
     * @return \Exception|mixed|\Throwable|void
     *
     * @noinspection MissingReturnTypeInspection
     */
    private function wrappedExceptionHandler(callable $callback, ...$parameters)
    {
        try {
            return $callback(...$parameters);
        } catch (\Throwable $throwable) {
            error($throwable->getMessage());

            return $throwable;
        }
    }
}
