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

trait Sanitizer
{
    /**
     * @return array<array<string, null|int|string>>
     */
    public function sanitizes(array $songs, string $keyword): array
    {
        return collect($songs)
            ->mapWithKeys(function (array $song, int $index) use ($keyword): array {
                $song = $this->sanitize($song, $keyword);
                array_unshift($song, "<fg=cyan>$index</>");

                return [$index => $song];
            })
            ->all();
    }

    /**
     * @return array<string, null|int|string>
     */
    public function sanitize(array $song, string $keyword): array
    {
        Arr::forget($song, ['id', 'pic_id', 'url_id', 'lyric_id', 'url']);

        $song['name'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['name']);
        $song['album'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['album']);
        $song['artist'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", implode(',', $song['artist']));
        $song['size'] = isset($song['size']) ? sprintf('<fg=yellow>%.1fM</>', $song['size'] / 1024 / 1024) : null;
        $song['br'] = (int) $song['br'];

        return $song;
    }
}
