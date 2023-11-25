<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit\Support;

use App\Contracts\Music;
use App\Exceptions\InvalidArgumentException;
use App\MusicManager;

it('will throw exception when driver not exists', function (): void {
    expect(new MusicManager(app()))->driver('bar')->toBeInstanceOf(Music::class);
})->group(__DIR__, __FILE__)->throws(InvalidArgumentException::class);
