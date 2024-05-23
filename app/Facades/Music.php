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

use App\MusicManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void download(string $url, string $savePath)
 * @method static mixed driver(string|null $driver = null)
 * @method static \App\MusicManager extend(string $driver, \Closure $callback)
 * @method static void flushMacros()
 * @method static \App\MusicManager forgetDrivers()
 * @method static \Illuminate\Contracts\Container\Container getContainer()
 * @method static string getDefaultDriver()
 * @method static array getDrivers()
 * @method static bool hasMacro(string $name)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static \Illuminate\Support\Collection search(string $keyword, array $sources = [])
 * @method static \App\MusicManager setContainer(\Illuminate\Contracts\Container\Container $container)
 * @method static \App\MusicManager|\Illuminate\Support\HigherOrderTapProxy tap(callable|null $callback = null)
 * @method static \App\MusicManager|mixed unless(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static \App\MusicManager|mixed when(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 *
 * @see \App\MusicManager
 */
final class Music extends Facade
{
    /**
     * @noinspection MissingParentCallInspection
     * @noinspection MethodVisibilityInspection
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    protected static function getFacadeAccessor(): string
    {
        return MusicManager::class;
    }
}
