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
class MusicManager extends Manager
{
    use Conditionable;
    use Macroable;
    use Tappable;

    #[\Override]
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
     * @param string $driver
     *
     * @throws BindingResolutionException
     */
    #[\Override]
    protected function createDriver(mixed $driver): Music
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
