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

namespace App\Concerns;

use GuzzleHttp\Client;

trait HttpClientFactory
{
    protected static ?Client $httpClient = null;

    public function createHttpClient(array $config = []): Client
    {
        if (!self::$httpClient instanceof Client || $config) {
            return self::$httpClient = new Client($config);
        }

        return self::$httpClient;
    }
}
