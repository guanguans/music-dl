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
use Illuminate\Foundation\Inspiring;
use LaravelZero\Framework\Commands\Command;

final class InspireCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'inspire {name=Artisan}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info(config('music-dl.logo'));
        $this->info(Inspiring::quote());

        return self::SUCCESS;
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
}
