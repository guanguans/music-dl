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

trait Sanitizer
{
    public function sanitizes(Collection $songs, string $keyword): Collection
    {
        return $songs->map(function (array $song, int $index) use ($keyword): array {
            $song = $this->sanitize($song, $keyword);
            array_unshift($song, "<fg=cyan>$index</>");

            return $song;
        });
    }

    /**
     * @psalm-suppress InvalidReturnType
     *
     * @return array<string, null|int|string>
     */
    public function sanitize(array $song, string $keyword): array
    {
        $song = Arr::only($song, ['name', 'artist', 'album', 'source', 'size', 'br']);
        $song['name'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", (string) $song['name']);
        $song['artist'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", implode(',', $song['artist']));
        $song['album'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", (string) $song['album']);
        $song['size'] = isset($song['size']) ? sprintf('<fg=yellow>%.1fM</>', $song['size'] / 1024 / 1024) : null;
        $song['br'] = (int) $song['br'];

        return $song;
    }
}
