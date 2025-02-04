<?php

/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection StaticClosureCanBeUsedInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace Tests\Unit\Facades;

use App\Facades\Music;
use Illuminate\Support\Facades\Concurrency;

it('can set music driver', function (): void {
    expect(Music::setDriver(Concurrency::driver()))->toBeInstanceOf(\App\Contracts\Music::class);
})->group(__DIR__, __FILE__);
