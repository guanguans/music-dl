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
    public static function defaultSavedDir(): string
    {
        $savedDir = windows_os()
            ? \sprintf('%s\\Downloads\\MusicDL\\', exec('echo %USERPROFILE%') ?: \sprintf('C:\\Users\\%s', get_current_user()))
            : \sprintf('%s/Downloads/MusicDL/', exec('echo $HOME') ?: exec('cd ~; pwd'));

        if (!is_dir($savedDir) && !mkdir($savedDir, 0o755, true) && !is_dir($savedDir)) {
            throw new RuntimeException(\sprintf('The directory "%s" was not created.', $savedDir));
        }

        return $savedDir;
    }

    /**
     * @throws \App\Exceptions\RuntimeException
     */
    public static function savedPathFor(array $song, ?string $savedDir = null, string $defaultExt = 'mp3'): string
    {
        $savedDir = Str::finish($savedDir ?? self::defaultSavedDir(), \DIRECTORY_SEPARATOR);

        if (!is_dir($savedDir) && !mkdir($savedDir, 0o755, true) && !is_dir($savedDir)) {
            throw new RuntimeException(\sprintf('The directory "%s" was not created.', $savedDir));
        }

        return \sprintf(
            '%s%s.%s',
            $savedDir,
            str(\sprintf('%s - %s', implode(',', $song['artist']), $song['name']))
                ->remove(match (\PHP_OS_FAMILY) {
                    'Windows' => ['<', '>', '/', '\\', '|', ':', '"', '?', '*'],
                    'Darwin' => [':'],
                    'Linux' => ['/'],
                    default => [\DIRECTORY_SEPARATOR],
                })
                ->ltrim('.')
                ->toString(),
            preg_replace('/\?.*/', '', pathinfo((string) $song['url'], \PATHINFO_EXTENSION)) ?: $defaultExt
        );
    }
}
