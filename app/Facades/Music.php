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

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \GuzzleHttp\Client createHttpClient(array $config = [])
 * @method static void download(string $url, string $savedPath)
 * @method static void flushMacros()
 * @method static bool hasMacro(string $name)
 * @method static void macro(string $name, object|callable $macro)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static \Illuminate\Support\Collection search(string $keyword, array $sources = [])
 *
 * @see \App\Music
 */
final class Music extends Facade
{
    /**
     * @noinspection MethodVisibilityInspection
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    protected static function getFacadeAccessor(): string
    {
        return \App\Contracts\Music::class;
    }
}
