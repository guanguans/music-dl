<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Support;

use App\Exceptions\RuntimeException;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

final class Utils
{
    /** @var positive-int */
    public const int ARTIST_TAKE = 3;

    /**
     * @throws \App\Exceptions\RuntimeException
     */
    public static function defaultSavedDirectory(): string
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
        $savedDir = Str::finish($savedDir ?? self::defaultSavedDirectory(), \DIRECTORY_SEPARATOR);

        if (!is_dir($savedDir) && !mkdir($savedDir, 0o755, true) && !is_dir($savedDir)) {
            throw new RuntimeException(\sprintf('The directory "%s" was not created.', $savedDir));
        }

        // $resource = fopen($song['url'], 'rb');
        // fstat($resource);
        // stat($song['url']);

        return \sprintf(
            '%s%s.%s',
            $savedDir,
            str(\sprintf(
                '%s - %s',
                collect($song['artist'])
                    ->when(
                        \count($song['artist']) > self::ARTIST_TAKE,
                        static fn (Collection $artist): Collection => $artist->take(self::ARTIST_TAKE)->push('...')
                    )
                    ->implode(','),
                $song['name']
            ))
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
