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
use Illuminate\Support\Str;

if (! function_exists('array_reduce_with_keys')) {
    function array_reduce_with_keys(array $array, callable $callback, $carry = null): mixed
    {
        foreach ($array as $key => $value) {
            $carry = $callback($carry, $value, $key);
        }

        return $carry;
    }
}

if (! function_exists('array_map_with_keys')) {
    function array_map_with_keys(callable $callback, array $array): array
    {
        $arr = [];
        foreach ($array as $key => $value) {
            $arr[$key] = $callback($value, $key);
        }

        return $arr;
    }
}

if (! function_exists('get_default_save_dir')) {
    /**
     * @throws \App\Exceptions\RuntimeException
     */
    function get_default_save_dir(): string
    {
        $saveDir = windows_os()
            ? sprintf('C:\\Users\\%s\\Downloads\\MusicDL\\', get_current_user())
            : sprintf('%s/Downloads/MusicDL/', exec('cd ~; pwd'));
        if (! is_dir($saveDir) && ! mkdir($saveDir, 0755, true) && ! is_dir($saveDir)) {
            throw new RuntimeException(sprintf('The directory "%s" was not created', $saveDir));
        }

        return $saveDir;
    }
}

if (! function_exists('get_save_path')) {
    /**
     * @throws \App\Exceptions\RuntimeException
     */
    function get_save_path(array $song, string $saveDir = null, string $defaultExt = 'mp3'): string
    {
        $saveDir = Str::finish($saveDir ?: get_default_save_dir(), DIRECTORY_SEPARATOR);
        if (! is_dir($saveDir) && ! mkdir($saveDir, 0755, true) && ! is_dir($saveDir)) {
            throw new RuntimeException(sprintf('The directory "%s" was not created', $saveDir));
        }

        $ext = pathinfo(parse_url($song['url'], PHP_URL_PATH), PATHINFO_EXTENSION);

        return sprintf(
            '%s%s - %s.%s',
            $saveDir,
            implode(',', $song['artist']),
            $song['name'],
            $ext ?: $defaultExt
        );
    }
}
