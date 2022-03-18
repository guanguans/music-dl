<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

use Metowolf\Meting;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class Music implements MusicInterface, HttpClientFactoryInterface
{
    use WithHttpClient;

    protected Meting $meting;

    public function __construct(Meting $meting)
    {
        $this->meting = $meting->format();
    }

    public function searchWithUrl(string $keyword, ?array $channels = null)
    {
        $songs = $this->search($keyword, $channels);

        return array_reduce($songs, function ($songs, $song) {
            $detail = json_decode($this->meting->url($song['url_id']), true);
            if (empty($detail['url'])) {
                return $songs;
            }
            $songs[] = array_merge($song, $detail);

            return $songs;
        }, []);
    }

    public function search(string $keyword, ?array $channels = null)
    {
        if (is_null($channels)) {
            return json_decode($this->meting->search($keyword), true);
        }

        return array_reduce($channels, function ($songs, $channel) use ($keyword) {
            $response = $this->meting->site($channel)->search($keyword);

            return array_merge($songs, json_decode($response, true));
        }, []);
    }

    public function download(string $downloadUrl, string $savePath)
    {
        $output = new ConsoleOutput();
        $options = [
            'sink' => $savePath,
            'progress' => function ($totalDownload, $downloaded) use ($output, &$progressBar, &$isDownloaded) {
                if ($totalDownload > 0 && $downloaded > 0 && empty($progressBar)) {
                    $progressBar = new ProgressBar($output, $totalDownload);
                    $progressBar->start();
                }

                if (!$isDownloaded && $progressBar && $totalDownload === $downloaded) {
                    $progressBar->finish();
                    $isDownloaded = true;
                }

                $progressBar and $progressBar->setProgress($downloaded);
            },
        ];

        return self::createHttpClient()->get($downloadUrl, $options);
    }

    public function batchFormat(array $songs, string $keyword): array
    {
        array_walk($songs, function (&$song, $index) use ($keyword) {
            $song = $this->format($song, $keyword);
            array_unshift($song, "<fg=cyan>$index</>");
        });

        return $songs;
    }

    public function format(array $song, string $keyword, $hideFields = ['id', 'pic_id', 'url_id', 'lyric_id', 'url']): array
    {
        foreach ($hideFields as $hideField) {
            unset($song[$hideField]);
        }

        $song['name'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['name']);
        $song['album'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['album']);
        $song['artist'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", implode(',', $song['artist']));
        $song['size'] = isset($song['size']) ? sprintf('<fg=yellow>%.1fM</>', $song['size'] / 1024 / 1024) : null;
        $song['br'] = (int) $song['br'];

        return $song;
    }

    public function getMeting(): Meting
    {
        return $this->meting;
    }
}
