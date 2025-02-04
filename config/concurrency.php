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
    /*
    |--------------------------------------------------------------------------
    | Default Concurrency Driver
    |--------------------------------------------------------------------------
    |
    | This option determines the default concurrency driver that will be used
    | by Laravel's concurrency functions. By default, concurrent work will
    | be sent to isolated PHP processes which will return their results.
    |
    | Supported: "process", "fork", "sync"
    |
    */

    'default' => env('CONCURRENCY_DRIVER', 'sync'),
];
