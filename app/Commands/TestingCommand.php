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

use Illuminate\Console\ConfirmableTrait;
use Illuminate\Console\Prohibitable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Validator;
use LaravelZero\Framework\Commands\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class TestingCommand extends Command
{
    use ConfirmableTrait;
    use LockableTrait;
    use Prohibitable;
    protected $signature = <<<'SIGNATURE'
        testing
        {--|name= : Specify the name}
        {--|age= : Specify the age}
        SIGNATURE;
    protected $description = 'Test command';

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function isEnabled(): bool
    {
        return $this->laravel->runningUnitTests();
    }

    /**
     * @see \Illuminate\Database\Console\Migrations\FreshCommand
     * @see \Illuminate\Database\Console\Migrations\RefreshCommand
     */
    public function handle(): int
    {
        if ($this->isProhibited() || !$this->confirmToProceed()) {
            return SymfonyCommand::FAILURE;
        }

        return SymfonyCommand::SUCCESS;
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(self::class)->everyMinute();
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        Validator::make($this->argument() + $this->options(), [
            'name' => 'required|string',
            'age' => 'required|integer|min:18',
        ])->validate();
    }
}
