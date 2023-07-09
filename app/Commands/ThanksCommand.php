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

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

final class ThanksCommand extends Command
{
    /**
     * The Command messages.
     */
    protected const FUNDING_MESSAGES = [
        '',
        '  - Star or contribute to Music DL:',
        '    <options=bold>https://github.com/guanguans/music-dl</>',
    ];

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
     * Execute the console command.
     */
    public function handle(): int
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

        return self::SUCCESS;
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
