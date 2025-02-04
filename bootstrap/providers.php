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

return [
    // Laravel Framework Service Providers...
    // Illuminate\Cache\CacheServiceProvider::class,
    // Illuminate\Filesystem\FilesystemServiceProvider::class,
    // Illuminate\Hashing\HashServiceProvider::class,
    // Illuminate\Pipeline\PipelineServiceProvider::class,
    Illuminate\Translation\TranslationServiceProvider::class,
    // Illuminate\Validation\ValidationServiceProvider::class,
    // Illuminate\View\ViewServiceProvider::class,
    Illuminate\Concurrency\ConcurrencyServiceProvider::class,

    // Application Service Providers...
    App\Providers\AppServiceProvider::class,
];
