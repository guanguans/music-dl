<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

final class ThanksCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'thanks';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Thanks for using this tool.';

    /**
     * The Command messages.
     *
     * @var array<int, string>
     */
    protected const FUNDING_MESSAGES = [
        '',
        '  - Star or contribute to Music DL:',
        '    <options=bold>https://github.com/guanguans/music-dl</>',
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $wantsToSupport = $this->ask('Can you quickly <options=bold>star our GitHub repository</>? 🙏🏻', 'yes');

        if ('yes' === $wantsToSupport) {
            PHP_OS_FAMILY === 'Darwin' and exec('open https://github.com/guanguans/music-dl');
            PHP_OS_FAMILY === 'Windows' and exec('start https://github.com/guanguans/music-dl');
            PHP_OS_FAMILY === 'Linux' and exec('xdg-open https://github.com/guanguans/music-dl');
        }

        foreach (self::FUNDING_MESSAGES as $message) {
            $this->output->writeln($message);
        }
    }

    /**
     * Define the command's schedule.
     *
     * @return void
     */
    public function schedule(Schedule $schedule)
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
