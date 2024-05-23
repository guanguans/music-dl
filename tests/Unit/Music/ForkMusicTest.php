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

namespace Tests\Unit\Music;

use App\Music\ForkMusic;
use Illuminate\Support\Collection;

it('can search songs', function (): void {
    expect(app(ForkMusic::class))->search('腰乐队', config('app.sources'))->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__)->skipOnWindows();
