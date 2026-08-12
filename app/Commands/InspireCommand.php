<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use LaravelZero\Framework\Commands\Command;

#[\Illuminate\Console\Attributes\Description('Display an inspiring quote')]
#[\Illuminate\Console\Attributes\Signature('inspire {name=Artisan}')]
final class InspireCommand extends Command
{
    public function handle(): void
    {
        $this->info(resolve('logo'));
        $this->components->info(Inspiring::quote());
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(self::class)->everyMinute();
    }
}
