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

namespace Tests\Unit\Support;

use App\Support\Utils;

it('can get default save dir', function (): void {
    expect(Utils::defaultSaveDir())->toBeDirectory();
})->group(__DIR__, __FILE__);

it('can get save path', function (array $song): void {
    expect(Utils::savePathFor($song))->toBeString()->toEndWith('.mp3');
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
        'url' => 'http://m8.music.126.net/20231125211927/8af8b7988921529700b6c770fd2022f4/ymusic/obj/w5zDlMODwrDDiGjCn8Ky/3307382749/f61f/636f/6518/ee00afde1ad90a3153401cae2d813de0.mp3?guid=821299180&vkey=CA4AFC0F0E09C82ACF9EFB9C40504238789863F44575C3C2116DDA25B1797F4C3C129177F1B45D40A5FD18D2015EE21E1445A164E306684B&uin=&fromtag=120042',
        'size' => 12_142_803,
        'br' => 320,
    ],
]);
