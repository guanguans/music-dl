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

use App\Music\SequenceMusic;
use App\MusicManager;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\ServiceProvider;
use Rahul900Day\LaravelConsoleSpinner\SpinnerMixin;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

final class AppServiceProvider extends ServiceProvider
{
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
    public function boot(): void
    {
        SequenceMusic::mixin(new SpinnerMixin());
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singletonIf(
            OutputStyle::class,
            static fn (): OutputStyle => new OutputStyle(new ArgvInput(), new ConsoleOutput())
        );
    }
}
