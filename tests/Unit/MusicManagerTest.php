<?php

/** @noinspection PhpMethodParametersCountMismatchInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace Tests\Unit;

use App\Contracts\Music;
use App\Exceptions\InvalidArgumentException;
use App\MusicManager;

it('will throw exception when driver not exists', function (): void {
    app(MusicManager::class)->driver('bar');
})->group(__DIR__, __FILE__)->throws(InvalidArgumentException::class);

it('can get default driver', function (): void {
    expect(app(MusicManager::class))->driver()->toBeInstanceOf(Music::class);
})->group(__DIR__, __FILE__);

it('can get custom driver', function (): void {
    $musicManager = app(MusicManager::class);
    $musicManager->extend('foo', static fn (): Music => \Mockery::mock(Music::class));
    expect($musicManager)->driver('foo')->toBeInstanceOf(Music::class);
})->group(__DIR__, __FILE__);

it('can get method driver', function (): void {
    $musicManager = new class(app()) extends MusicManager {
        /**
         * @noinspection PhpUnused
         */
        public function createFooDriver(): Music
        {
            return \Mockery::mock(Music::class);
        }
    };
    expect($musicManager)->driver('foo')->toBeInstanceOf(Music::class);
})->group(__DIR__, __FILE__);
