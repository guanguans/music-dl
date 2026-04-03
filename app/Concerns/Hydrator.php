<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Concerns;

use Illuminate\Support\Collection;

trait Hydrator
{
    use Sanitizer;

    /**
     * @param Collection<int, array<string, mixed>> $songs
     *
     * @return Collection<int, string>
     */
    public function hydrates(Collection $songs, string $keyword): Collection
    {
        return $this->sanitizes($songs, $keyword)
            ->map(fn (array $sanitizedSong): string => $this->hydrate($sanitizedSong))
            ->prepend(__('all_songs'));
    }

    /**
     * @param array<int|string, null|scalar> $sanitizedSong
     */
    public function hydrate(array $sanitizedSong): string
    {
        return collect($sanitizedSong)->except(0)->implode(' ');
    }
}
