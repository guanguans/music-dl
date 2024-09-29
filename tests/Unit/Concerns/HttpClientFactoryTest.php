<?php

/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection StaticClosureCanBeUsedInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace Tests\Unit\Concerns;

use App\Concerns\HttpClientFactory;
use GuzzleHttp\Client;

uses(HttpClientFactory::class);

it('can create http client', function (): void {
    expect($this)
        ->createHttpClient()->toBeInstanceOf(Client::class)
        ->createHttpClient()->toBeInstanceOf(Client::class);
})->group(__DIR__, __FILE__);
