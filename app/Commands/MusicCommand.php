<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Commands;

use App\MusicInterface;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

class MusicCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'music';

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
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->config = config('music-dl');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(MusicInterface $music)
    {
        $this->line($this->config['logo']);

        START:

        windows_os() and $this->line($this->config['win_tips']);
        $keyword = str($this->ask($this->config['search_tips'], '腰乐队'))->trim();
        $this->line(sprintf($this->config['searching'], $keyword));

        $startTime = microtime(true);
        $songs = $music->searchWithUrl($keyword, $this->config['channels']);
        $endTime = microtime(true);
        if (empty($songs)) {
            $this->line($this->config['empty_result']);
            goto START;
        }

        $this->table($this->config['table_header'], $music->batchFormat($songs, $keyword));
        $this->line(sprintf($this->config['search_statistics'], $endTime - $startTime, memory_get_peak_usage() / 1024 / 1024));

        SELECT_INDEX:

        $index = str($this->ask($this->config['download_tips'], 'all'))->trim()->lower();
        $indexes = $index->explode(',');
        if ('n' === (string) $index) {
            goto START;
        } elseif ('all' === (string) $index) {
            $indexes = collect($songs)->keys();
        } elseif ((string) $index < 0 || (string) $index >= count($songs) || !preg_match('/^[0-9,]*$/', $index)) {
            $this->line($this->config['input_error']);
            goto SELECT_INDEX;
        }

        collect($songs)
            ->filter(function ($song, $index) use ($indexes) {
                return in_array($index, $indexes->all());
            })
            ->each(function ($song) use ($music, $keyword) {
                $this->table($music->format($song, $keyword), []);
                try {
                    $music->download($song['url'], $savePath = get_song_save_path($song));
                } catch (Throwable $e) {
                    $this->line(sprintf($this->config['download_failed_tips'], $e->getMessage()));
                    $this->newLine();

                    return;
                }
                $this->line(sprintf($this->config['save_path_tips'], $savePath));
                $this->newLine();
                $this->notify(config('app.name'), $savePath, $this->config['success_icon']);
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
