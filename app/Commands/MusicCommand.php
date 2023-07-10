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

use App\Concerns\Sanitizer;
use App\Contracts\Music;
use App\MusicManager;
use App\Support\Utils;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;
use SebastianBergmann\Timer\ResourceUsageFormatter;
use SebastianBergmann\Timer\Timer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class MusicCommand extends Command
{
    use Sanitizer;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'music
                            {sources?* : Specify the music sources(tencent、netease、kugou)}
                            {--driver=sequence : Specify the driver of the music manager}
                            {--d|dir= : Specify the download directory}';

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
     *
     * @psalm-suppress InvalidReturnType
     */
    public function handle(Timer $timer, ResourceUsageFormatter $resourceUsageFormatter): void
    {
        $this->line($this->config['logo']);

        START:

        windows_os() and $this->line($this->config['windows_tips']);
        $keyword = (string) str($this->ask($this->config['search_tips'], '腰乐队'))->trim();
        $this->line(sprintf($this->config['searching'], $keyword));

        $sources = ($sources = (array) $this->argument('sources')) ? $sources : $this->config['sources'];
        $timer->start();
        $songs = $this->music->search($keyword, $sources);
        $duration = $timer->stop();
        if (empty($songs)) {
            $this->line($this->config['empty_result']);

            goto START;
        }

        $this->table($this->config['table_header'], $formatSongs = $this->sanitizes($songs, $keyword));
        $this->info($resourceUsageFormatter->resourceUsage($duration));
        if (! $this->confirm($this->config['confirm_download'])) {
            goto START;
        }

        $choices = collect($formatSongs)
            ->transform(static function (array $song): string {
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
            ->transform(static fn (string $select): bool|int|string => $choices->search($select))
            ->pipe(static function (Collection $selectedKeys) use ($lastKey, $songs): Collection {
                if (\in_array($lastKey, $selectedKeys->all())) {
                    return collect($songs)->keys();
                }

                return $selectedKeys;
            })
            ->pipe(static fn (Collection $selectedKeys): Collection => collect($songs)->filter(
                static fn (array $song, int $key): bool => \in_array($key, $selectedKeys->all())
            ))
            ->each(function (array $song, int $index) use ($formatSongs): void {
                try {
                    $this->table($formatSongs[$index], []);
                    $this->music->download($song['url'], $savePath = Utils::get_save_path($song, $this->option('dir')));
                    $this->line(sprintf($this->config['save_path_tips'], $savePath));
                    $this->newLine();
                } catch (\Throwable $throwable) {
                    $this->line(sprintf($this->config['download_failed_tips'], $throwable->getMessage()));
                    $this->newLine();
                }
            })
            ->when(! windows_os(), function (): void {
                $this->notify(
                    config('app.name'),
                    $this->option('dir') ?: Utils::get_default_save_dir(),
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

    /**
     * @throws BindingResolutionException
     */
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        File::ensureDirectoryExists($this->option('dir') ?: Utils::get_default_save_dir());
        $this->config = config('music-dl');
        $this->music = $this->laravel->make(MusicManager::class)->driver($this->option('driver'));
    }
}
