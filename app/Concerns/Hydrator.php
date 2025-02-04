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

namespace App\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

trait Hydrator
{
    use Sanitizer;

    public function hydrates(Collection $songs, string $keyword): Collection
    {
        return $this->sanitizes($songs, $keyword)
            ->transform(fn (array $sanitizedSong): string => $this->hydrate($sanitizedSong))
            ->prepend(__('all_songs'));
    }

    public function hydrate(array $sanitizedSong): string
    {
        return implode('  ', Arr::except($sanitizedSong, [0]));
    }
}
