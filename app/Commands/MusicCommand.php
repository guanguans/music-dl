<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Commands;

use App\MusicInterface;
use App\SongFormatter;
use Illuminate\Console\Scheduling\Schedule;
use Joli\JoliNotif\Util\OsHelper;
use LaravelZero\Framework\Commands\Command;

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
    protected $description = 'Search and download songs';

    public function __construct()
    {
        parent::__construct();
        $this->config = config('music-dl');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(MusicInterface $musicClient, SongFormatter $songFormatter)
    {
        $this->line($this->config['logo']);

        START:

        if (OsHelper::isWindows()) {
            $this->line($this->config['win_tips']);
        }
        $keyword = str($this->ask($this->config['search_tips'], '腰乐队'))->trim();
        $this->line(sprintf($this->config['searching'], $keyword));

        $startTime = microtime(true);
        $songs = $musicClient->searchWithUrl($keyword, $this->config['channels']);
        $endTime = microtime(true);
        if (empty($songs)) {
            $this->line($this->config['empty_result']);
            goto START;
        }

        $this->table($this->config['table_header'], $songFormatter->formatAll($songs, $keyword));
        $this->line(sprintf($this->config['search_statistics'], $endTime - $startTime, memory_get_peak_usage() / 1024 / 1024));

        SELECT_INDEX:

        $index = str($this->ask($this->config['download_tips'], 'all'))->trim()->lower();
        $indexes = $index->explode(',');
        if ('n' === (string) $index) {
            goto START;
        } elseif ('all' === (string) $index) {
            $indexes = collect($songs)->keys();
        } elseif ((string) $index < 0 || (string) $index >= count($songs) || ! preg_match('/^[0-9,]*$/', $index)) {
            $this->line($this->config['input_error']);
            goto SELECT_INDEX;
        }

        collect($songs)
            ->filter(function ($song, $index) use ($indexes) {
                return in_array($index, $indexes->all());
            })
            ->each(function ($song) use ($musicClient, $keyword, $songFormatter) {
                $this->table($songFormatter->format($song, $keyword), []);
                $musicClient->download($song['url'], $savePath = get_save_path($song));
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
