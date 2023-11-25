<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit\Facades;

use App\Facades\Music;

it('can get music driver', function (): void {
    expect(Music::driver())->toBeInstanceOf(\App\Contracts\Music::class);
})->group(__DIR__, __FILE__);
