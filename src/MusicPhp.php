<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPhp;

use GuzzleHttp\Client;
use Metowolf\Meting;

class MusicPhp
{
    protected $meting;

    protected $platforms = ['tencent', 'netease', 'kugou', 'baidu', 'xiami'];

    protected $formatConfig = ['name', 'artist', 'album', 'source', 'size', 'br'];

    protected $httpClient;

    protected $keyword;

    //[id] => 001NMq6p3ZQ2GN
    //[name] => 一个短篇
    //[artist] => 腰乐队
    //[album] => 相见恨晚
    //[pic_id] => 000PkFBb3MAmiB
    //[url_id] => 001NMq6p3ZQ2GN
    //[lyric_id] => 001NMq6p3ZQ2GN
    //[source] => tencent
    //[url] => http://dl.stream.qqmusic.qq.com/M800001NMq6p3ZQ2GN.mp3?guid=288162861&vkey=DE6747747BA1CCF35DA0D57072D425D0F96F51BB754A1C5C37DDA842DF78EAE6C6652FA2C580F5DD98DD522482E0E43046E61729E0BA80CA&uin=0&fromtag=66
    //[size] => 17.2M
    //[br] => 320

    /**
     * MusicPhp constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $keyword
     *
     * @return array
     */
    public function searchAll()
    {
        $songsAll = [];
        foreach ($this->platforms as $platform) {
            $meting = (new Meting($platform));
            $songs = $this->search($meting, $this->keyword);
            foreach ($songs as $key => &$song) {
                $detail = \json_decode($meting->format()->url($song['url_id']), true);
                if (!empty($detail['url'])) {
                    $song = \array_merge($song, $detail);
                    $song['artist'] = \implode(', ', $song['artist']);
                    $song['size'] = isset($song['size']) ? \sprintf('%.1f', $song['size'] / 1048576).'M' : '';
                } else {
                    unset($songs[$key]);
                }
            }
            unset($song);
            $songsAll = \array_merge($songsAll, $songs);
        }

        return $songsAll;
    }

    public function search(Meting $meting)
    {
        $this->setMeting($meting);

        return \json_decode($this->getMeting()->format()->search($this->keyword), true);
    }

    /**
     * @return mixed
     */
    public function getMeting()
    {
        return $this->meting;
    }

    /**
     * @param mixed $meting
     */
    public function setMeting(Meting $meting)
    {
        $this->meting = $meting;
    }

    /**
     * @return mixed
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    public function format(array $songs)
    {
        foreach ($songs as $key => &$song) {
            $song['name'] = str_replace($this->keyword, "<info>$this->keyword</info>", $song['name']);
            $song['artist'] = str_replace($this->keyword, "<info>$this->keyword</info>", $song['artist']);
            $song['album'] = str_replace($this->keyword, "<info>$this->keyword</info>", $song['album']);
            unset($song['id']);
            unset($song['pic_id']);
            unset($song['url_id']);
            unset($song['lyric_id']);
            unset($song['url']);
            array_unshift($song, "<info>$key</info>");
        }
        unset($song);
        // var_export($songs);die;
        return $songs;
    }

    public function formatDan(array $song)
    {
        unset($song['id']);
        unset($song['pic_id']);
        unset($song['url_id']);
        unset($song['lyric_id']);
        unset($song['url']);

        return $song;
    }

    /**
     * @param array $song
     */
    public function download(array $song)
    {
        $this->httpClient->get($song['url'], ['save_to' => $song['name'].'.mp3']);
    }

    /**
     * @return mixed
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param mixed $httpClient
     */
    public function setHttpClient(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}
