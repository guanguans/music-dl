<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use App\Exceptions\RuntimeException;

if (! function_exists('array_reduces')) {
    /**
     * @param $carry
     *
     * @return mixed|null
     */
    function array_reduces(array $array, callable $callback, $carry = null)
    {
        foreach ($array as $key => $value) {
            $carry = call_user_func($callback, $carry, $value, $key);
        }

        return $carry;
    }
}

if (! function_exists('array_maps')) {
    /**
     * @return array
     */
    function array_maps(callable $callback, array $array)
    {
        $arr = [];
        foreach ($array as $key => $value) {
            $arr[$key] = call_user_func($callback, $value, $key);
        }

        return $arr;
    }
}

if (! function_exists('get_song_download_dir')) {
    /**
     * @throws \App\Exceptions\RuntimeException
     */
    function get_song_download_dir(string $dir = 'MusicDL'): string
    {
        $downloadDir = windows_os()
            ? sprintf('C:\\Users\\%s\\Downloads\\%s\\', get_current_user(), $dir)
            : sprintf('%s/Downloads/%s/', exec('cd ~; pwd'), $dir);
        if (! is_dir($downloadDir) && ! mkdir($downloadDir, 0755, true) && ! is_dir($downloadDir)) {
            throw new RuntimeException(sprintf('The directory "%s" was not created', $downloadDir));
        }

        return $downloadDir;
    }
}

if (! function_exists('get_song_save_path')) {
    /**
     * @throws \App\Exceptions\RuntimeException
     */
    function get_song_save_path(array $song, string $defaultExt = 'mp3'): string
    {
        $ext = pathinfo(parse_url($song['url'], PHP_URL_PATH), PATHINFO_EXTENSION);

        return sprintf(
            '%s%s - %s.%s',
            get_song_download_dir(),
            implode(',', $song['artist']),
            $song['name'],
            $ext ?: $defaultExt
        );
    }
}
