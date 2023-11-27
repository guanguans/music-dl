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

it('can get save path', function (array $song): void {
    expect(Utils::getSavePath($song))->toBeString();
})->group(__DIR__, __FILE__)->with([
    fn (): array => [
        'id' => 1_386_737_246,
        'name' => '公路之光',
        'artist' => ['腰乐队'],
        'album' => '他们说忘了摇滚有问题',
        'pic_id' => '109951164323917099',
        'url_id' => 1_386_737_246,
        'lyric_id' => 1_386_737_246,
        'source' => 'netease',
        'url' => 'http://m8.music.126.net/20231125211927/8af8b7988921529700b6c770fd2022f4/ymusic/obj/w5zDlMODwrDDiGjCn8Ky/3307382749/f61f/636f/6518/ee00afde1ad90a3153401cae2d813de0.mp3',
        'size' => 12_142_803,
        'br' => 320,
    ],
]);
