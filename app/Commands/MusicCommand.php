<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Commands;

use App\Concerns\Formatter;
use App\ConcurrencyMusic;
use App\Contracts\Music as MusicContract;
use App\Music;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Collection;
use LaravelZero\Framework\Commands\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class MusicCommand extends Command
{
    use Formatter;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'music
                            {source?* : Specify the source(tencent、netease、kugou) of the song}
                            {--d|dir= : The directory where the songs are saved}
                            {--c|concurrent : Search for songs concurrently}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Search and download songs.';

    private array $config;

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        if (
            $this->option('dir')
            && ! is_dir($this->option('dir'))
            && ! mkdir($this->option('dir'), 0755, true)
            && ! is_dir($this->option('dir'))
        ) {
            throw new \RuntimeException(sprintf('The directory "%s" was not created', $this->option('dir')));
        }

        $this->config = config('music-dl');

        $this->app->bind(
            MusicContract::class,
            fn (Container $container) => $this->option('concurrent')
                ? $container->make(ConcurrencyMusic::class)
                : $container->make(Music::class)
        );
    }

    /**
     * Execute the console command.
     *
     * @psalm-suppress InvalidReturnType
     */
    public function handle(MusicContract $musicContract): void
    {
        $this->line($this->config['logo']);

        START:

        windows_os() and $this->line($this->config['win_tips']);
        $keyword = (string) str($this->ask($this->config['search_tips'], '腰乐队'))->trim();
        $this->line(sprintf($this->config['searching'], $keyword));

        $channels = ($sources = (array) $this->argument('source')) ? $sources : $this->config['channels'];
        $startTime = microtime(true);
        $songs = $musicContract->search($keyword, $channels);
        $endTime = microtime(true);
        if (empty($songs)) {
            $this->line($this->config['empty_result']);
            goto START;
        }

        $this->table($this->config['table_header'], $formatSongs = $this->batchFormat($songs, $keyword));
        $this->line(sprintf($this->config['search_statistics'], $endTime - $startTime, memory_get_peak_usage() / 1024 / 1024));
        if (! $this->confirm($this->config['confirm_download'])) {
            goto START;
        }

        $choices = collect($formatSongs)
            ->transform(function (array $song): string {
                unset($song[0]);

                return implode('  ', $song);
            })
            ->push($this->config['download_all_songs']);

        $selectedValues = $this->choice(
            $this->config['download_choice_tips'],
            $choices->all(),
            $lastKey = ($choices->count() - 1),
            null,
            true
        );

        collect($selectedValues)
            ->transform(fn (string $select) => $choices->search($select))
            ->pipe(function (Collection $selectedKeys) use ($lastKey, $songs) {
                if (in_array($lastKey, $selectedKeys->all())) {
                    return collect($songs)->keys();
                }

                return $selectedKeys;
            })
            ->pipe(fn (Collection $selectedKeys) => collect($songs)->filter(
                fn (array $song, int $key) => in_array($key, $selectedKeys->all())
            ))
            ->each(function (array $song, int $index) use ($formatSongs, $musicContract): void {
                try {
                    $this->table($formatSongs[$index], []);
                    $musicContract->download($song['url'], $savePath = get_save_path($song, $this->option('dir')));
                    $this->line(sprintf($this->config['save_path_tips'], $savePath));
                    $this->newLine();
                } catch (\Throwable $e) {
                    $this->line(sprintf($this->config['download_failed_tips'], $e->getMessage()));
                    $this->newLine();

                    return;
                }
            })
            ->when(! windows_os(), function (): void {
                $this->notify(
                    config('app.name'),
                    $this->option('dir') ?: get_default_save_dir(),
                    $this->config['success_icon']
                );
            });

        goto START;
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
