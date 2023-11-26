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

use App\Concerns\Sanitizer;
use Illuminate\Support\Collection;

it('can batch sanitize songs', function (array $originalSongs): void {
    expect(new class() {
        use Sanitizer;
    })->sanitizes(collect($originalSongs), '腰乐队')->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__)->with('originalSongs');
