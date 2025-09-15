<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Commands;

use App\Exceptions\RuntimeException;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

final class ThanksCommand extends Command
{
    /**
     * The Command messages.
     *
     * @var list<string>
     */
    protected const array FUNDING_MESSAGES = [
        '',
        '  - Star or contribute to Music DL:',
        '    <options=bold>https://github.com/guanguans/music-dl</>',
    ];
    protected $signature = 'thanks';
    protected $description = 'Thanks for using this tool.';

    public function handle(): void
    {
        if ('yes' === $this->ask('Can you quickly <options=bold>star our GitHub repository</>? 🙏🏻', 'yes')) {
            match (\PHP_OS_FAMILY) {
                'Windows' => exec('start https://github.com/guanguans/music-dl'),
                'Darwin' => exec('open https://github.com/guanguans/music-dl'),
                'Linux' => exec('xdg-open https://github.com/guanguans/music-dl'),
                default => throw new RuntimeException(\sprintf('Unsupported OS: %s', \PHP_OS_FAMILY)),
            };
        }

        $this->output->writeln(self::FUNDING_MESSAGES);
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
