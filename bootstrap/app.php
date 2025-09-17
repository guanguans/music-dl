<?php

/** @noinspection PhpVoidFunctionResultUsedInspection */

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
use Composer\XdebugHandler\XdebugHandler;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Console\OutputStyle;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Log\LogManager;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Illuminate\Validation\ValidationException;
use LaravelZero\Framework\Application;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

return Application::configure(basePath: \dirname(__DIR__))
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
                    $_SERVER['argv'] = []; // @codeCoverageIgnore
                }

                $argvInput = new ArgvInput;
                $consoleOutput = new ConsoleOutput;

                // to configure all -v, -vv, -vvv options without memory-lock to Application run() arguments
                (fn () => $this->configureIO($argvInput, $consoleOutput))->call(new ConsoleApplication);

                // --debug is called
                if ($argvInput->hasParameterOption(['--debug', '--xdebug'])) {
                    $consoleOutput->setVerbosity(OutputInterface::VERBOSITY_DEBUG); // @codeCoverageIgnore
                }

                // disable output for tests
                if (app()->runningUnitTests()) {
                    $consoleOutput->setVerbosity(OutputInterface::VERBOSITY_QUIET); // @codeCoverageIgnore
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
    ->booted(static function (): void {
        collect(Artisan::all())
            ->each(
                static fn (SymfonyCommand $command): SymfonyCommand => $command
                    ->addOption('xdebug', null, InputOption::VALUE_NONE, 'Display xdebug output')
                    ->addOption(
                        'configuration',
                        null,
                        InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                        'Used to dynamically pass one or more configuration key-value pairs(e.g. `--configuration=app.name=guanguans` or `--configuration app.name=guanguans`).',
                    )
            )
            ->tap(
                /**
                 * @see \Illuminate\Foundation\Console\Kernel::rerouteSymfonyCommandEvents()
                 * @see \Rector\Console\ConsoleApplication::doRun()
                 */
                static fn (): null => Event::listen(CommandStarting::class, static function (CommandStarting $commandStarting): void {
                    // @codeCoverageIgnoreStart
                    if (!$commandStarting->input->hasParameterOption('--xdebug') && !app()->runningUnitTests()) {
                        $xdebugHandler = new XdebugHandler(config('app.name'));
                        $xdebugHandler->setPersistent();
                        $xdebugHandler->check();
                        unset($xdebugHandler);
                    }

                    collect($commandStarting->input->getOption('configuration'))
                        // ->dump()
                        ->mapWithKeys(static function (string $configuration): array {
                            \assert(str_contains($configuration, '='), "The configureable option [$configuration] must be formatted as key=value.");

                            [$key, $value] = str($configuration)->explode('=', 2)->all();

                            return [$key => $value];
                        })
                        ->tap(static fn (Collection $configuration): mixed => config($configuration->all()));
                    // @codeCoverageIgnoreEnd
                })
            );
    })
    ->booted(static function (Application $app): void {
        // collect((fn (): array => array_keys($this->serviceProviders))->call($app))->dump();
    })
    ->withExceptions(static function (Exceptions $exceptions): void {
        $exceptions
            ->map(
                ValidationException::class,
                fn (ValidationException $validationException) => (function (): ValidationException {
                    $this->message = \PHP_EOL.($prefix = '- ').implode(\PHP_EOL.$prefix, $this->validator->errors()->all()); // @codeCoverageIgnore

                    return $this; // @codeCoverageIgnore
                })->call($validationException)
            )
            ->dontReport(Throwable::class)
            ->reportable(static fn (Throwable $throwable): false => false)
            ->stop();
    })
    ->create();
