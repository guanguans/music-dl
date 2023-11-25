<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit\Concerns;

use App\Concerns\HttpClientFactory;
use GuzzleHttp\Client;

it('can create http client', function (): void {
    expect(new class() {
        use HttpClientFactory;
    })
        ->createHttpClient()->toBeInstanceOf(Client::class)
        ->createHttpClient()->toBeInstanceOf(Client::class);
})->group(__DIR__, __FILE__);
