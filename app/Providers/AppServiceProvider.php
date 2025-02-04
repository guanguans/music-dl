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

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Traits\Conditionable;

final class AppServiceProvider extends ServiceProvider
{
    use Conditionable {
        Conditionable::when as whenever;
    }

    /**
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
    }

    public function boot(): void
    {
        // ...
    }
}
