<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit\Concerns;

use App\Concerns\Hydrator;
use Illuminate\Support\Collection;

uses(Hydrator::class);

it('can batch sanitize songs', function (array $songs): void {
    expect($this)->hydrates(collect($songs), '腰乐队')->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__)->with('songs');
