<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use App\Contracts\Music as MusicContract;
use App\Music;
use App\Support\Meting;
use Illuminate\Console\OutputStyle;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Concurrency;
use Intonate\TinkerZero\TinkerZeroServiceProvider;
use LaravelZero\Framework\Application;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

return Application::configure(basePath: \dirname(__DIR__))
    ->registered(static function (Application $app): void {
        if (class_exists(TinkerZeroServiceProvider::class) && !$app->isProduction()) {
            $app->register(TinkerZeroServiceProvider::class);
        }
    })
    ->booting(static function (Application $app): void {
        $app->singleton(
            Music::class,
            static fn (Application $app): Music => new Music(new Meting, Concurrency::driver())
        );

        $app->bind(
            MusicContract::class,
            static fn (Application $app): MusicContract => $app->make(Music::class)
        );

        $app->singletonIf(
            OutputStyle::class,
            static fn (): OutputStyle => new OutputStyle(new ArgvInput, new ConsoleOutput)
        );
    })
    ->booted(static function (Application $app): void {
        $app->extend(LogManager::class, static function (LoggerInterface $logger, Application $application) {
            if (!$logger instanceof LogManager) {
                return new LogManager($application);
            }

            return $logger;
        });
    })
    ->withExceptions(static function (Exceptions $exceptions): void {
        $exceptions->reportable(static function (\Throwable $throwable) {
            if (\Phar::running()) {
                return false;
            }
        });
    })
    ->create();
