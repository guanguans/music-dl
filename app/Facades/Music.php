<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Facades;

use App\MusicManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string getDefaultDriver()
 * @method static mixed driver(string|null $driver = null)
 * @method static \App\MusicManager extend(string $driver, \Closure $callback)
 * @method static array getDrivers()
 * @method static \Illuminate\Contracts\Container\Container getContainer()
 * @method static \App\MusicManager setContainer(\Illuminate\Contracts\Container\Container $container)
 * @method static \App\MusicManager forgetDrivers()
 * @method static \App\MusicManager|mixed when(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static \App\MusicManager|mixed unless(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static void macro(string $name, object|callable $macro)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static \App\MusicManager|\Illuminate\Support\HigherOrderTapProxy tap(callable|null $callback = null)
 * @method static array search(string $keyword, array $sources = [])
 * @method static void download(string $url, string $savePath)
 *
 * @see \App\MusicManager
 */
final class Music extends Facade
{
    /**
     * @noinspection MissingParentCallInspection
     * @noinspection MethodVisibilityInspection
     */
    #[\Override]
    protected static function getFacadeAccessor(): string
    {
        return MusicManager::class;
    }
}
