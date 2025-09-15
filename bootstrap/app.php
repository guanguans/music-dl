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
    ->booting(static function (Application $app): void {
        $app->extend(LoggerInterface::class, static function (LoggerInterface $logger, Application $app): LogManager {
            if (!$logger instanceof LogManager) {
                $logger = new LogManager($app);
            }

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            /** @noinspection PhpPossiblePolymorphicInvocationInspection */
            return tap($logger)->setDefaultDriver('null');
        });
    })
    ->withExceptions(static function (Exceptions $exceptions): void {
        $exceptions
            ->dontReport(Throwable::class)
            ->reportable(static fn (Throwable $throwable): false => false)
            ->stop();
    })
    ->create();
