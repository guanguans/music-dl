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

namespace Tests\Unit;

use App\Music;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use Illuminate\Support\Collection;

it('can search songs', function (Collection $songs): void {
    // $this->app->singleton(Music::class, static function () use ($songs) {
    //     $mockMusic = \Mockery::mock(Music::class);
    //     $mockMusic->allows('search')->andReturn($songs);
    //
    //     return $mockMusic->makePartial();
    // });
    expect(app(Music::class))->search('腰乐队', config('app.sources'))->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__)->with('songs');

it('will throw exception when download failed', function (): void {
    try {
        app(Music::class)->download('foo.mp3', downloads_path('foo.mp3'));
    } catch (GuzzleException $guzzleException) {
        throw new TransferException($guzzleException->getMessage());
    }
})->group(__DIR__, __FILE__)->throws(TransferException::class);
