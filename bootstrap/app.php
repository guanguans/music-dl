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
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

return Application::configure(basePath: \dirname(__DIR__))
    ->registered(static function (Application $app): void {
        if (class_exists(TinkerZeroServiceProvider::class) && !$app->isProduction()) {
            $app->register(TinkerZeroServiceProvider::class);
        }
    })
    ->booting(static function (Application $app): void {
        $app->singleton(Music::class);
        $app->bind(MusicContract::class, Music::class);
    })
    ->booting(static function (Application $app): void {
        /**
         * @see \Rector\Console\Style\SymfonyStyleFactory
         */
        $app->singletonIf(
            OutputStyle::class,
            static function (): OutputStyle {
                // to prevent missing argv indexes
                /** @noinspection GlobalVariableUsageInspection */
                if (!isset($_SERVER['argv'])) {
                    /** @noinspection GlobalVariableUsageInspection */
                    $_SERVER['argv'] = [];
                }

                $argvInput = new ArgvInput;
                $consoleOutput = new ConsoleOutput;

                // to configure all -v, -vv, -vvv options without memory-lock to Application run() arguments
                (fn () => $this->configureIO($argvInput, $consoleOutput))->call(new ConsoleApplication);

                // --debug is called
                if ($argvInput->hasParameterOption('--debug')) {
                    $consoleOutput->setVerbosity(OutputInterface::VERBOSITY_DEBUG);
                }

                return new OutputStyle($argvInput, $consoleOutput);
            }
        );

        $app->singleton(
            ConsoleLogger::class,
            static fn (Application $app): ConsoleLogger => new ConsoleLogger($app->make(OutputStyle::class))
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
