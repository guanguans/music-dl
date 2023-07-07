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

trait Formatter
{
    /**
     * @return mixed[]
     */
    public function batchFormat(array $songs, string $keyword): array
    {
        return collect($songs)
            ->mapWithKeys(function (array $song, int $index) use ($keyword): array {
                $song = $this->format($song, $keyword);
                array_unshift($song, "<fg=cyan>$index</>");

                return [$index => $song];
            })
            ->all();
    }

    /**
     * @return array<array-key, string>
     */
    public function format(array $song, string $keyword, array $hideFields = null): array
    {
        null === $hideFields and $hideFields = ['id', 'pic_id', 'url_id', 'lyric_id', 'url'];
        foreach ($hideFields as $hideField) {
            unset($song[$hideField]);
        }

        $song['name'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['name']);
        $song['album'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['album']);
        $song['artist'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", implode(',', $song['artist']));
        $song['size'] = isset($song['size']) ? sprintf('<fg=yellow>%.1fM</>', $song['size'] / 1024 / 1024) : null;
        $song['br'] = (int) $song['br'];

        return $song;
    }
}
