<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Commands;

use App\MusicClientInterface;
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
    public function handle(MusicClientInterface $musicClient, SongFormatter $songFormatter)
    {
        $this->output->writeln($this->config['logo']);

        start:

        $this->output->writeln($this->config['search_tip']);
        if (OsHelper::isWindows()) {
            $this->output->writeln($this->config['win_tip']);
        }

        $keyword = str($this->ask($this->config['input'], '周杰伦'))->trim();
        if ($keyword->isEmpty()) {
            $this->output->writeln($this->config['input_error']);
            goto start;
        }

        $this->output->writeln($this->config['splitter']);
        $this->output->writeln(sprintf($this->config['searching'], $keyword));

        $startTime = microtime(true);
        $songs = $musicClient->searchWithUrl($keyword, [
            // 'netease',
            'tencent',
            // 'xiami',
            // 'kugou',
            // 'baidu',
            // 'kuwo'
        ]);
        if (empty($songs)) {
            $this->output->writeln($this->config['empty_result']);
            goto start;
        }

        $this->table($this->config['table_header'], $songFormatter->formatAll($songs, $keyword));
        $this->output->writeln(
            sprintf(
                '搜索耗时 %s 秒，最大内存占用 %s',
                round((microtime(true) - $startTime) / 1000, 1),
                memory_get_peak_usage()
            )
        );

        serialNumber:

        $this->output->writeln($this->config['download_tip']);
        $serialNumber = str($this->ask($this->config['input'], 'all'))->trim()->lower();
        if ('n' === (string) $serialNumber) {
            goto start;
        }
        if (
            'all' !== (string) $serialNumber &&
            ((string) $serialNumber < 0 || (string) $serialNumber >= count($songs) || !preg_match('/^[0-9,]*$/', $serialNumber))) {
            $this->output->writeln($this->config['input_error']);
            goto serialNumber;
        }
        $serialNumbers = $serialNumber->explode(',');
        if ('all' === (string) $serialNumber) {
            $serialNumbers = collect($songs)->keys();
        }

        $serialNumbers->each(function ($serialNumber) use ($musicClient, $keyword, $songFormatter, $songs) {
            if (!isset($songs[$serialNumber])) {
                return;
            }
            $song = $songs[$serialNumber];
            $this->table($songFormatter->format($song, $keyword), []);
            $this->output->writeln($this->config['downloading']);

            $savePath = sprintf(
                $this->config['save_path'],
                get_downloads_dir(),
                implode(',', $song['artist']),
                $song['name']
            );
            $musicClient->download($song['url'], $savePath);
            $this->output->writeln($savePath);
            $this->notify('Music DL', $savePath, $this->config['icon_success']);
        });

        goto start;
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
