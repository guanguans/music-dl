<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPHP;

use Guanguans\MusicPHP\Contracts\MusicInterface;
use Guanguans\MusicPHP\Exceptions\Exception;
use Guanguans\MusicPHP\Exceptions\HttpException;
use GuzzleHttp\Client;
use Metowolf\Meting;

/**
 * Class Music.
 */
class Music implements MusicInterface
{
    protected $platforms = ['tencent', 'netease', 'xiami', 'kugou'];

    protected $hideFields = ['id', 'pic_id', 'url_id', 'lyric_id', 'url'];

    protected $guzzleOptions = [];

    /**
     * Music constructor.
     */
    public function __construct()
    {
    }

    public function searchAll(string $keyword): array
    {
        $songAll = [];

        foreach ($this->platforms as $platform) {
            $songAll = array_merge($songAll, $this->search($platform, $keyword));
        }

        return $songAll;
    }

    /**
     * @return mixed
     */
    public function search(string $platform, string $keyword)
    {
        $meting = $this->getMeting($platform);

        $songs = json_decode($meting->format()->search($keyword), true);

        foreach ($songs as $key => &$song) {
            $detail = json_decode($meting->format()->url($song['url_id']), true);
            if (empty($detail['url'])) {
                unset($songs[$key]);
            }
            $song = array_merge($song, $detail);
        }
        unset($song);

        return $songs;
    }

    public function getMeting(string $platform): Meting
    {
        return new Meting($platform);
    }

    public function formatAll(array $songs, string $keyword): array
    {
        foreach ($songs as $key => &$song) {
            $song = $this->format($song, $keyword);
            array_unshift($song, "<fg=cyan>$key</>");
        }

        unset($song);

        return $songs;
    }

    public function format(array $song, string $keyword): array
    {
        foreach ($this->hideFields as $hideField) {
            unset($song[$hideField]);
        }

        $song['name'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['name']);
        $song['album'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['album']);
        $song['artist'] = implode(',', $song['artist']);
        $song['artist'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['artist']);
        $song['size'] = '<fg=yellow>'.sprintf('%.1f', $song['size'] / 1048576).'M</>';

        return $song;
    }

    /**
     * @return mixed|void
     *
     * @throws \Guanguans\MusicPHP\Exceptions\HttpException
     */
    public function download(array $song)
    {
        try {
            $this->getHttpClient()->get($song['url'], ['save_to' => get_save_path($song)]);
        } catch (Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getHttpClient(): Client
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }
}
