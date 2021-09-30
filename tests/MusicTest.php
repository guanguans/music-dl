<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Tests;

use Exception;
use Guanguans\MusicPHP\Music;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Metowolf\Meting;
use Psr\Http\Message\ResponseInterface;

class MusicTest extends TestCase
{
    protected $music;

    protected function setUp(): void
    {
        parent::setUp();
        $this->music = new Music();
    }

    public function formatProvider()
    {
        return [
            'baidu' => [
                [
                    'id' => '7334109',
                    'name' => '世纪终曲',
                    'artist' => [
                            0 => '黄凯芹',
                        ],
                    'album' => '短篇小说',
                    'pic_id' => '7334109',
                    'url_id' => '7334109',
                    'lyric_id' => '7334109',
                    'source' => 'baidu',
                    'url' => 'http://zhangmenshiting.qianqian.com/data2/music/137038188/137038188.mp3?xcode=74f83870e51112ce180b9e6dd2675aac',
                    'size' => 18000457,
                    'br' => 320,
                ],
            ],
            'kugou' => [
                [
                    'id' => 'ac3e22b81efed59167f18ab3bd59214f',
                    'name' => '一个短篇',
                    'artist' => [
                            0 => '腰乐队',
                        ],
                    'album' => '相见恨晚',
                    'url_id' => 'ac3e22b81efed59167f18ab3bd59214f',
                    'pic_id' => 'ac3e22b81efed59167f18ab3bd59214f',
                    'lyric_id' => 'ac3e22b81efed59167f18ab3bd59214f',
                    'source' => 'kugou',
                    'url' => 'http://fs.ios.kugou.com/201905311132/875e8801000c64567e6034cb7bf2b4b8/G050/M00/16/1F/EpQEAFZe4WSAGVgZARKqSRChciY965.mp3',
                    'size' => 18000457,
                    'br' => 320,
                ],
            ],
        ];
    }

    public function formatAllProvider()
    {
        return [
            [
                [
                    [
                        'id' => '7334109',
                        'name' => '世纪终曲',
                        'artist' => [
                                0 => '黄凯芹',
                            ],
                        'album' => '短篇小说',
                        'pic_id' => '7334109',
                        'url_id' => '7334109',
                        'lyric_id' => '7334109',
                        'source' => 'baidu',
                        'url' => 'http://zhangmenshiting.qianqian.com/data2/music/137038188/137038188.mp3?xcode=74f83870e51112ce180b9e6dd2675aac',
                        'size' => 18000457,
                        'br' => 320,
                    ],
                    [
                        'id' => 'ac3e22b81efed59167f18ab3bd59214f',
                        'name' => '一个短篇',
                        'artist' => [
                                0 => '腰乐队',
                            ],
                        'album' => '相见恨晚',
                        'url_id' => 'ac3e22b81efed59167f18ab3bd59214f',
                        'pic_id' => 'ac3e22b81efed59167f18ab3bd59214f',
                        'lyric_id' => 'ac3e22b81efed59167f18ab3bd59214f',
                        'source' => 'kugou',
                        'url' => 'http://fs.ios.kugou.com/201905311132/875e8801000c64567e6034cb7bf2b4b8/G050/M00/16/1F/EpQEAFZe4WSAGVgZARKqSRChciY965.mp3',
                        'size' => 18000457,
                        'br' => 320,
                    ],
                ],
            ],
        ];
    }

    public function testSearchAll()
    {
        $songAll = $this->music->searchAll('mock-str');

        $this->assertIsArray($songAll);
        foreach ($songAll as $song) {
            $this->assertIsArray($song);
        }
        // $platforms = array_unique(array_column($songAll, 'source'));
        // $this->assertGreaterThanOrEqual(1, count($platforms));
    }

    public function testSearch()
    {
        $platform = 'netease';
        $songs = $this->music->search($platform, 'mock-str');
        $this->assertIsArray($songs);
        foreach ($songs as $song) {
            $this->assertIsArray($song);
            $this->assertSame($platform, $song['source']);
            $this->assertArrayHasKey('url', $song);
        }
    }

    /**
     * @dataProvider formatProvider
     */
    public function testDownloadClientException($song)
    {
        $this->markTestSkipped();
        $this->expectException(ClientException::class);
        $this->music->download($song);
    }

    public function testDownloadException()
    {
        $song = [
            'id' => '7334109',
            'name' => '世纪终曲',
            'artist' => [
                0 => '黄凯芹',
            ],
            'album' => '短篇小说',
            'pic_id' => '7334109',
            'url_id' => '7334109',
            'lyric_id' => '7334109',
            'source' => 'baidu',
            'url' => 'http://zhangmenshiting.qianqian.com/data2/music/137038188/137038188.mp3?xcode=74f83870e51112ce180b9e6dd2675aac',
            'size' => 18000457,
            'br' => 320,
        ];

        $this->markTestSkipped();

        $this->expectException(Exception::class);
        $this->music->download($song);
    }

    public function testDownload()
    {
        $songs = $this->music->search('tencent', '公路之光');
        if (empty($songs)) {
            $this->markTestSkipped();
        }

        $song = reset($songs);
        $response = $this->music->download($song);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertStringContainsString($song['name'], $response->getBody()->getMetadata()['uri']);
        $this->assertFileExists($response->getBody()->getMetadata()['uri']);
    }

    public function testGetMeting()
    {
        $this->assertInstanceOf(Meting::class, $this->music->getMeting('mock-str'));
    }

    /**
     * @dataProvider formatProvider
     */
    public function testFormat($song)
    {
        $songFormat = $this->music->format($song, '一个短篇');

        $this->assertArrayHasKey('name', $songFormat);
        $this->assertArrayHasKey('artist', $songFormat);
        $this->assertArrayHasKey('album', $songFormat);
        $this->assertArrayHasKey('source', $songFormat);
        $this->assertArrayHasKey('br', $songFormat);

        $this->assertArrayNotHasKey('id', $songFormat);
        $this->assertArrayNotHasKey('pic_id', $songFormat);
        $this->assertArrayNotHasKey('url_id', $songFormat);
        $this->assertArrayNotHasKey('lyric_id', $songFormat);
        $this->assertArrayNotHasKey('url', $songFormat);
    }

    /**
     * @dataProvider formatAllProvider
     */
    public function testFormatAll($songs)
    {
        $formatSongs = $this->music->formatAll($songs, '一个短篇');
        foreach ($formatSongs as $k => $item) {
            $this->assertSame("<fg=cyan>$k</>", $item[0]);
        }
    }

    public function testGetHttpClient()
    {
        // 断言返回结果为 GuzzleHttp\ClientInterface 实例
        $this->assertInstanceOf(ClientInterface::class, $this->music->getHttpClient());
    }

    public function testSetGuzzleOptions()
    {
        // 设置参数前，timeout 为 null
        $this->assertNull($this->music->getHttpClient()->getConfig('timeout'));
        // 设置参数
        $this->music->setGuzzleOptions(['timeout' => 3000]);
        // 设置参数后，timeout 为 3000
        $this->assertSame(3000, $this->music->getHttpClient()->getConfig('timeout'));
    }

    public function testGetSerializedOutput()
    {
        $mock_number = 1000;
        $this->music->setSerializedOutput($mock_number);
        $this->assertSame($mock_number, $this->music->getSerializedOutput());
    }
}
