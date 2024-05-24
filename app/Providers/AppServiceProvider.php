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

namespace App\Providers;

use App\MusicManager;
use Illuminate\Console\OutputStyle;
use Illuminate\Log\LogManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Traits\Conditionable;
use LaravelZero\Framework\Application;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

final class AppServiceProvider extends ServiceProvider
{
    use Conditionable {
        Conditionable::when as whenever;
    }

    /**
     * All of the container singletons that should be registered.
     *
     * @var array<class-string|int, class-string>
     */
    public array $singletons = [
        MusicManager::class,
    ];

    /**
     * Register any application services.
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function register(): void
    {
        // $this->unless($this->app->isProduction(), function (): void {
        //     // $this->app->register(\LaravelLang\Actions\ServiceProvider::class);
        //     // $this->app->register(\LaravelLang\Attributes\ServiceProvider::class);
        //     // $this->app->register(\LaravelLang\HttpStatuses\ServiceProvider::class);
        //     $this->app->register(\LaravelLang\JsonFallback\TranslationServiceProvider::class);
        //     // $this->app->register(\LaravelLang\Lang\ServiceProvider::class);
        //     $this->app->register(\LaravelLang\Locales\ServiceProvider::class);
        //     $this->app->register(\LaravelLang\Publisher\ServiceProvider::class);
        // });

        $this->app->singletonIf(
            OutputStyle::class,
            static fn (): OutputStyle => new OutputStyle(new ArgvInput, new ConsoleOutput)
        );
    }

    public function boot(): void
    {
        // $this->app->extend(LogManager::class, static function (LoggerInterface $logger, Application $application) {
        //     if (!$logger instanceof LogManager) {
        //         return new LogManager($application);
        //     }
        //
        //     return $logger;
        // });
    }
}
