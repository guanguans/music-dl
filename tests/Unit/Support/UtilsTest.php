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

it('can get save path', function (): void {
    expect(Utils::getSavePath([
        'id' => 1386735587,
        'name' => '在这宁静的水坑路',
        'artist' => ['腰乐队'],
        'album' => '他们说忘了摇滚有问题',
        'pic_id' => '109951164323917099',
        'url_id' => 1386735587,
        'lyric_id' => 1386735587,
        'source' => 'netease',
        'url' => 'http://m8.music.126.net/20231125210148/a57d961c47436fe024009b73b67183cf/ymusic/obj/w5zDlMODwrDDiGjCn8Ky/3307387265/081d/9dc7/8d6e/5e354180f0d2925a257c5e2b55037828.mp3',
        'size' => 16259701,
        'br' => 320,
    ]))->toBeString();
})->group(__DIR__, __FILE__);
