<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Tests;

use Guanguans\MusicPhp\MusicPhp;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Metowolf\Meting;
use Mockery\Matcher\AnyArgs;

class MusicPhpTest extends TestCase
{
    public function testSearchAll()
    {
        $m = new MusicPhp();
        $songAll = [];
        $songAll = array_merge($songAll, $m->search('mock-string', '周杰伦'));
        $this->assertIsArray($songAll);
    }

    public function testSearch()
    {
        $m = new MusicPhp();
        $meting = $m->getMeting('mock-key');
        $songs = json_decode($meting->format()->search('周杰伦'), true);
        $this->assertIsArray($songs);
    }

    public function testGetMeting()
    {
        $m = new MusicPhp();
        $this->assertInstanceOf(Meting::class, $m->getMeting('mock-key'));
    }

    public function testFormat()
    {
        $song = [
            'id' => 123,
            'url' => 'abc',
            'name' => 'abc',
            'album' => 'abc',
            'artist' => ['abc', 'edf'],
            'source' => 'baidu',
        ];

        unset($song['id']);
        $this->assertArrayNotHasKey('id', $song);

        $song['name'] = str_replace('abc', '<info>abc</info>', $song['name']);
        $this->assertSame('<info>abc</info>', $song['name']);

        $song['artist'] = implode(',', $song['artist']);
        $this->assertIsString($song['artist']);
    }

    public function testFormatAll()
    {
        $m = new MusicPhp();
        $songs = [
            [
                'id' => 123,
                'url' => 'abc',
                'name' => '晴天',
                'album' => 'abc',
                'artist' => ['abc', 'edf'],
                'source' => 'baidu',
                'br' => '128',
            ],
            [
                'id' => 123,
                'url' => 'abc',
                'name' => '晴天2',
                'album' => 'abc',
                'artist' => ['abc', 'edf'],
                'source' => 'baidu',
                'br' => '128',
            ],
        ];
        $formatSongs = $m->formatAll($songs, '晴天');
        foreach ($formatSongs as $k => $item) {
            $this->assertArrayHasKey(0, $item);
            $this->assertSame($item[0], "<info>$k</info>");
        }
    }

    public function testDownloadWithGuzzleRuntimeException()
    {
        $client = \Mockery::mock(Client::class);
        $client->allows()
               ->get(new AnyArgs())
               ->andThrow(new \Exception('request timeout'));

        $w = \Mockery::mock(MusicPhp::class)->makePartial();
        $w->allows()->getHttpClient()->andReturn($client);

        $this->expectExceptionMessage('request timeout');

        $w->download([
            'id' => 123,
            'url' => 'abc',
            'name' => '晴天',
            'album' => 'abc',
            'artist' => ['abc', 'edf'],
            'source' => 'baidu',
            'br' => '128',
        ]);
    }

    public function testGetHttpClient()
    {
        $m = new MusicPhp();
        // 断言返回结果为 GuzzleHttp\ClientInterface 实例
        $this->assertInstanceOf(ClientInterface::class, $m->getHttpClient());
    }

    public function testSetGuzzleOptions()
    {
        $m = new MusicPhp();
        // 设置参数前，timeout 为 null
        $this->assertNull($m->getHttpClient()->getConfig('timeout'));
        // 设置参数
        $m->setGuzzleOptions(['timeout' => 3000]);
        // 设置参数后，timeout 为 3000
        $this->assertSame(3000, $m->getHttpClient()->getConfig('timeout'));
    }
}
