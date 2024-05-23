<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Support;

use App\Exceptions\RuntimeException;
use Illuminate\Support\Str;

final class Utils
{
    /**
     * @throws \App\Exceptions\RuntimeException
     */
    public static function defaultSaveDir(): string
    {
        $saveDir = windows_os()
            ? sprintf('%s\\Downloads\\MusicDL\\', exec('echo %USERPROFILE%') ?: sprintf('C:\\Users\\%s', get_current_user()))
            : sprintf('%s/Downloads/MusicDL/', exec('echo $HOME') ?: exec('cd ~; pwd'));

        if (!is_dir($saveDir) && !mkdir($saveDir, 0o755, true) && !is_dir($saveDir)) {
            throw new RuntimeException(sprintf('The directory "%s" was not created.', $saveDir));
        }

        return $saveDir;
    }

    /**
     * @throws \App\Exceptions\RuntimeException
     */
    public static function savePathFor(array $song, ?string $saveDir = null, string $defaultExt = 'mp3'): string
    {
        $saveDir = Str::finish($saveDir ?? self::defaultSaveDir(), \DIRECTORY_SEPARATOR);

        if (!is_dir($saveDir) && !mkdir($saveDir, 0o755, true) && !is_dir($saveDir)) {
            throw new RuntimeException(sprintf('The directory "%s" was not created.', $saveDir));
        }

        return sprintf(
            '%s%s - %s.%s',
            $saveDir,
            implode(',', $song['artist']),
            $song['name'],
            preg_replace('/\?.*/', '', pathinfo((string) $song['url'], \PATHINFO_EXTENSION)) ?: $defaultExt
        );
    }
}
