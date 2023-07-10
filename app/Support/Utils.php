<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Support;

use App\Exceptions\RuntimeException;
use Illuminate\Support\Str;

class Utils
{
    /**
     * @throws \App\Exceptions\RuntimeException
     */
    public static function get_default_save_dir(): string
    {
        $saveDir = windows_os()
            ? sprintf('C:\\Users\\%s\\Downloads\\MusicDL\\', get_current_user())
            : sprintf('%s/Downloads/MusicDL/', exec('cd ~; pwd'));

        if (! is_dir($saveDir) && ! mkdir($saveDir, 0755, true) && ! is_dir($saveDir)) {
            throw new RuntimeException(sprintf('The directory "%s" was not created.', $saveDir));
        }

        return $saveDir;
    }

    /**
     * @throws \App\Exceptions\RuntimeException
     */
    public static function get_save_path(array $song, ?string $saveDir = null, string $defaultExt = 'mp3'): string
    {
        $saveDir = Str::finish($saveDir ?? self::get_default_save_dir(), \DIRECTORY_SEPARATOR);

        if (! is_dir($saveDir) && ! mkdir($saveDir, 0755, true) && ! is_dir($saveDir)) {
            throw new RuntimeException(sprintf('The directory "%s" was not created.', $saveDir));
        }

        return sprintf(
            '%s%s - %s.%s',
            $saveDir,
            implode(',', $song['artist']),
            $song['name'],
            pathinfo(parse_url($song['url'], PHP_URL_PATH), PATHINFO_EXTENSION) ?: $defaultExt
        );
    }
}