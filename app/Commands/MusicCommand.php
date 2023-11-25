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

use App\Concerns\Sanitizer;
use App\Contracts\Music;
use App\Support\Utils;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;
use SebastianBergmann\Timer\ResourceUsageFormatter;
use SebastianBergmann\Timer\Timer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Laravel\Prompts\error;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

final class MusicCommand extends Command
{
    use Sanitizer;

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
    public function handle(Timer $timer, ResourceUsageFormatter $resourceUsageFormatter): int
    {
        return collect()
            ->tap(fn () => \Laravel\Prompts\info($this->config['logo']))
            ->when(windows_os(), fn () => warning($this->config['windows_hint']))
            ->tap(function () use (&$keyword): void {
                $keyword = str($this->argument('keyword') ?? text(
                    $this->config['keyword_label'],
                    $this->config['keyword_label'],
                    $this->config['keyword_default'],
                    $this->config['keyword_label']
                ))->trim()->toString();
            })
            ->pipe(function () use ($timer, &$songs, $keyword, &$duration): Collection {
                $timer->start();
                $songs = spin(
                    fn (): array => $this->music->search($keyword, $this->option('sources')),
                    $this->config['searching_hint']
                );
                $duration = $timer->stop();

                return $songs = collect($songs)->mapWithKeys(static fn ($song, $index): array => [$index + 1 => $song]);
            })
            ->whenEmpty(function (): void {
                warning($this->config['empty_hint']);
                $this->reHandle();
            })
            ->tap(function (Collection $songs) use (&$sanitizedSongs, $keyword, $resourceUsageFormatter, $duration): void {
                table($this->config['table_header'], $sanitizedSongs = $this->sanitizes($songs->all(), $keyword));
                \Laravel\Prompts\info($resourceUsageFormatter->resourceUsage($duration));
            })
            ->tap(function () use (&$options, $sanitizedSongs): void {
                $options = collect($sanitizedSongs)
                    ->transform(static fn (array $song): string => implode('  ', Arr::except($song, [0])))
                    ->prepend($this->config['all_songs']);
            })
            ->tap(function () use (&$selectedKeys, $options): void {
                $selectedKeys = collect(
                    multiselect(
                        $this->config['select_label'],
                        $options->all(),
                        [$options->first()],
                        20,
                        $this->config['select_label'],
                        hint: $this->config['select_hint'],
                    )
                )->transform(static fn (string $selectedValue): bool|int|string => $options->search($selectedValue));
            })
            ->pipe(
                fn (Collection $songs): Collection => \in_array(0, $selectedKeys->all(), true)
                ? $songs : $songs->only($selectedKeys->all())
            )
            ->each(fn (array $song) => $this->wrappedExceptionHandler(fn () => $this->music->download(
                $song['url'],
                Utils::getSavePath($song, $this->option('dir'))
            )))
            ->tap(fn () => $this->wrappedExceptionHandler(fn () => $this->notify(
                config('app.name'),
                $this->option('dir'),
                resource_path('notify-icon.png')
            )))
            ->when(! $this->option('no-continue'), fn (): int => $this->reHandle())
            ->pipe(static fn (): int => self::SUCCESS);
    }

    /**
     * Define the command's schedule.
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }

    /**
     * @throws BindingResolutionException
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
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

    private function reHandle(): int
    {
        return $this->handle(new Timer(), new ResourceUsageFormatter());
    }
}
