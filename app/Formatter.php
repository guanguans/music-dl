<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

class Formatter
{
    public function formatAll(array $songs, string $keyword): array
    {
        foreach ($songs as $key => &$song) {
            $song = $this->format($song, $keyword);
            array_unshift($song, "<fg=cyan>$key</>");
        }

        unset($song);

        return $songs;
    }

    public function format(array $song, string $keyword): array
    {
        $hideFields = ['id', 'pic_id', 'url_id', 'lyric_id', 'url'];
        foreach ($hideFields as $hideField) {
            unset($song[$hideField]);
        }

        $song['name'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['name']);
        $song['album'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['album']);
        $song['artist'] = implode(',', $song['artist']);
        $song['artist'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['artist']);
        $song['size'] = isset($song['size']) ? '<fg=yellow>'.sprintf('%.1f', $song['size'] / 1048576).'M</>' : null;

        return $song;
    }
}
