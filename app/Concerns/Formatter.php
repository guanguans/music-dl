<?php

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
    public function batchFormat(array $songs, string $keyword): array
    {
        return collect($songs)
            ->mapWithKeys(function ($song, $index) use ($keyword) {
                $song = $this->format($song, $keyword);
                array_unshift($song, "<fg=cyan>$index</>");

                return [$index => $song];
            })
            ->all();
    }

    public function format(array $song, string $keyword, $hideFields = ['id', 'pic_id', 'url_id', 'lyric_id', 'url']): array
    {
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
