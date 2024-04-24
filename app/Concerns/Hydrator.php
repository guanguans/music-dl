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
