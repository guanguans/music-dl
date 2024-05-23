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

namespace Tests\Unit\Concerns;

use App\Concerns\Hydrator;
use Illuminate\Support\Collection;

uses(Hydrator::class);

it('can batch sanitize songs', function (Collection $songs): void {
    expect($this)->hydrates($songs, '腰乐队')->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__)->with('songs');
