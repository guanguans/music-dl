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

use function Laravel\Prompts\confirm;
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
            ->pipe(function () use ($timer, &$songs, &$sanitizedSongs, $resourceUsageFormatter, &$options): Collection {
                $keyword = str($this->argument('keyword') ?? text($this->config['keyword_label'], '关键字', '腰乐队', true, hint: $this->config['keyword_hint']))
                    ->trim()
                    ->toString();
                $sources = array_filter((array) $this->option('sources')) ?: $this->config['sources'];

                $timer->start();
                $songs = spin(fn (): array => $this->music->search($keyword, $sources), $this->config['searching_hint']);
                $duration = $timer->stop();
                if ([] === $songs) {
                    warning($this->config['empty_result_hint']);
                    $this->rehandle();
                }

                $sanitizedSongs = $this->sanitizes($songs, $keyword);
                table($this->config['table_header'], $sanitizedSongs);
                $this->info($resourceUsageFormatter->resourceUsage($duration));
                if (! confirm($this->config['confirm_download_label'])) {
                    $this->rehandle();
                }

                $options = collect($sanitizedSongs)
                    ->transform(static fn (array $song): string => implode('  ', Arr::except($song, [0])))
                    ->prepend($this->config['all_songs']);

                return collect(multiselect(
                    $this->config['select_label'],
                    $options->all(),
                    [$options->first()],
                    20,
                    true,
                    hint: $this->config['select_hint'],
                ));
            })
            ->transform(static fn (string $selectedValue): bool|int|string => $options->search($selectedValue))
            ->pipe(
                static fn (Collection $selectedKeys): Collection => collect($songs)
                    ->pipe(
                        static fn (Collection $songs): Collection => \in_array(0, $selectedKeys->all(), true)
                            ? $songs
                            : $songs->only($selectedKeys->all())->mapWithKeys(static fn (array $song, int $index): array => [$index - 1 => $song])
                    )
            )
            ->each(function (array $song, int $index): void {
                try {
                    // table($sanitizedSongs[$index], []);
                    $this->music->download($song['url'], Utils::getSavePath($song, $this->option('dir')));
                } catch (\Throwable $throwable) {
                    error($throwable->getMessage());
                }
            })
            ->when(! windows_os(), fn () => $this->notify(
                config('app.name'),
                $this->option('dir') ?: Utils::getDefaultSaveDir(),
                $this->config['success_icon']
            ))
            ->when(! $this->option('no-continue'), fn (): int => $this->rehandle())
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
        File::ensureDirectoryExists($this->option('dir') ?: Utils::getDefaultSaveDir());
        $this->config = config('music-dl');
        $this->music = \App\Facades\Music::driver($this->option('driver'));
    }

    private function rehandle(): int
    {
        return $this->handle(new Timer(), new ResourceUsageFormatter());
    }
}
