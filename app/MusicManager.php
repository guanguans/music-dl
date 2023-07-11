<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

use App\Contracts\Music;
use App\Exceptions\InvalidArgumentException;
use App\Music\SequenceMusic;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Manager;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Traits\Tappable;

/**
 * @mixin \App\Contracts\Music
 */
final class MusicManager extends Manager
{
    use Conditionable;
    use Macroable;
    use Tappable;

    public function getDefaultDriver(): string
    {
        return (string) str(SequenceMusic::class)
            ->classBasename()
            ->replaceLast(class_basename(Music::class), '');
    }

    /**
     * @noinspection MissingParentCallInspection
     * @noinspection PhpMissingParentCallCommonInspection
     *
     * @param mixed $driver
     *
     * @throws BindingResolutionException
     */
    protected function createDriver($driver)
    {
        if (isset($this->customCreators[$driver])) {
            return $this->callCustomCreator($driver);
        }

        $studlyName = Str::studly($driver);

        if (method_exists($this, $method = "create{$studlyName}Driver")) {
            return $this->{$method}();
        }

        if (class_exists($class = "App\\Music\\{$studlyName}Music")) {
            return $this->container->make($class);
        }

        throw new InvalidArgumentException("Driver [$driver] not supported.");
    }
}
