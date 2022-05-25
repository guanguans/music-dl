<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Concerns;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

trait WithHttpClient
{
    protected static ?ClientInterface $httpClient = null;

    public function createHttpClient(array $config = []): ClientInterface
    {
        if (! self::$httpClient instanceof ClientInterface || $config) {
            return self::$httpClient = new Client($config);
        }

        return self::$httpClient;
    }
}
