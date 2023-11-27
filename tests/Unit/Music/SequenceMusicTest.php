<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit\Music;

use App\Music\SequenceMusic;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use Illuminate\Support\Collection;

it('can search songs', function (): void {
    expect(app(SequenceMusic::class))->search('腰乐队', config('music-dl.sources'))->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__);

it('will throw exception when download failed', function (): void {
    try {
        app(SequenceMusic::class)->download('foo.mp3', downloads_path('foo.mp3'));
    } catch (GuzzleException $e) {
        throw new TransferException($e->getMessage());
    }
})->group(__DIR__, __FILE__)->throws(TransferException::class);
