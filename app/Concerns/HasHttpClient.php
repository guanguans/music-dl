<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Concerns;

use GuzzleHttp\Client;

trait HasHttpClient
{
    protected static ?Client $httpClient = null;

    public function createHttpClient(array $config = []): Client
    {
        if (! self::$httpClient instanceof Client || $config) {
            return self::$httpClient = new Client($config);
        }

        return self::$httpClient;
    }
}
