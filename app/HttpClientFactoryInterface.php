<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

use GuzzleHttp\ClientInterface;

interface HttpClientFactoryInterface
{
    public static function createHttpClient(array $config = []): ClientInterface;
}
