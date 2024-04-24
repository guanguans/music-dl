<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Providers;

use App\MusicManager;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Traits\Conditionable;
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
     * Bootstrap any application services.
     */
    public function boot(): void {}

    /**
     * Register any application services.
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function register(): void
    {
        $this->unless($this->app->isProduction(), function (): void {
            $this->app->register(\LaravelLang\Attributes\ServiceProvider::class);
            $this->app->register(\LaravelLang\HttpStatuses\ServiceProvider::class);
            $this->app->register(\LaravelLang\Lang\ServiceProvider::class);
            $this->app->register(\LaravelLang\Locales\ServiceProvider::class);
            $this->app->register(\LaravelLang\Publisher\ServiceProvider::class);
        });

        $this->app->singletonIf(
            OutputStyle::class,
            static fn (): OutputStyle => new OutputStyle(new ArgvInput(), new ConsoleOutput())
        );
    }
}
