<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit\Support;

use App\Support\Utils;

it('can get default save dir', function (): void {
    expect(Utils::getDefaultSaveDir())->toBeDirectory();
})->group(__DIR__, __FILE__);

it('can get save path', function ($originalSong): void {
    expect(Utils::getSavePath($originalSong))->toBeString();
})->group(__DIR__, __FILE__)->with('originalSong');
