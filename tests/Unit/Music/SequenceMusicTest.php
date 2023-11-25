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

use App\Music\SequenceMusic;
use App\Support\Meting;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use Illuminate\Support\Collection;

it('can search songs', function (): void {
    $search = '[{"id":28768120,"name":"硬汉","artist":["腰乐队"],"album":"相见恨晚","pic_id":"109951164144451252","url_id":28768120,"lyric_id":28768120,"source":"netease"},{"id":1386737246,"name":"公路之光","artist":["腰乐队"],"album":"他们说忘了摇滚有问题","pic_id":"109951164323917099","url_id":1386737246,"lyric_id":1386737246,"source":"netease"},{"id":28768123,"name":"晚春","artist":["腰乐队"],"album":"相见恨晚","pic_id":"109951164144451252","url_id":28768123,"lyric_id":28768123,"source":"netease"}]';
    $url = '{"url":"http://m802.music.126.net/20231125200728/e2f7be51f869df3e345fc6bf7afe9de2/jd-musicrep-ts/740f/2dee/6215/f56c69d40ec9e7d3a62c529121e86385.mp3","size":481115,"br":128.012}';
    $mockMeting = \Mockery::mock(Meting::class);
    $mockMeting->allows('search')->andReturns($search);
    $mockMeting->allows('url')->andReturns($url);
    expect(new SequenceMusic($mockMeting->makePartial()))->search('腰乐队', ['netease'])->toBeInstanceOf(Collection::class);
})->group(__DIR__, __FILE__);

it('will throw exception when download failed', function (): void {
    try {
        (new SequenceMusic(new Meting()))->download('foo.mp3', downloads_path('foo.mp3'));
    } catch (GuzzleException $e) {
        throw new TransferException($e->getMessage());
    }
})->group(__DIR__, __FILE__)->throws(TransferException::class);
