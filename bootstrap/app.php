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
use Illuminate\Console\OutputStyle;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Log\LogManager;
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
        $app->singleton(Music::class);
        $app->bind(MusicContract::class, Music::class);

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
