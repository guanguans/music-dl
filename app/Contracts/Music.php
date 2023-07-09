<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Contracts;

interface Music
{
    public function search(string $keyword, ?array $channels = null): array;

    public function download(string $url, string $savePath): void;
}
