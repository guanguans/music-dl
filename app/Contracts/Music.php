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

namespace App\Contracts;

use Illuminate\Support\Collection;

interface Music
{
    /**
     * @param array<string, mixed> $options
     */
    public function search(string $keyword, array $options): Collection;

    public function download(string $url, string $savedPath): void;
}
