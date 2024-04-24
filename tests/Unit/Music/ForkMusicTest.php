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

use App\Music\ForkMusic;
use Illuminate\Support\Collection;

it('can search songs', function (): void {
    expect(app(ForkMusic::class))->search('腰乐队', config('app.sources'))->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__)->skipOnWindows();
