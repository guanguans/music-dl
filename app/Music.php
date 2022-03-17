<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

use App\Exceptions\RuntimeException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Metowolf\Meting;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use Throwable;

class Music implements MusicClientInterface, HttpClientFactoryInterface
{
    protected Meting $meting;

    public function __construct(Meting $meting)
    {
        $this->meting = $meting;
    }

    public function createHttpClient(array $config = []): ClientInterface
    {
        return new Client($config);
    }

    public function searchWithUrl(string $keyword, ?array $channels = null)
    {
        $songs = $this->search($keyword, $channels);

        return array_reduce($songs, function ($songs, $song) {
            $detail = json_decode($this->meting->format()->url($song['url_id']), true);
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
            return json_decode($this->meting->format()->search($keyword), true);
        }

        return array_reduce($channels, function ($songs, $channel) use ($keyword) {
            $response = $this->meting->site($channel)->format()->search($keyword);

            return array_merge($songs, json_decode($response, true));
        }, []);
    }

    public function download(string $downloadUrl, string $savePath)
    {
        try {
            $output = new ConsoleOutput();
            $options = [
                'sink' => $savePath,
                'progress' => function ($totalDownload, $downloaded) use ($output, &$progressBar, &$isDownloaded) {
                    if ($totalDownload > 0 && $downloaded > 0 && empty($progressBar)) {
                        $progressBar = new ProgressBar($output, $totalDownload);
                        $progressBar->setFormat('very_verbose');
                        $progressBar->start();
                    }

                    if (! $isDownloaded && $progressBar && $totalDownload === $downloaded) {
                        $progressBar->finish();
                        $output->writeln(PHP_EOL);
                        $isDownloaded = true;
                    }

                    $progressBar and $progressBar->setProgress($downloaded);
                },
            ];

            return $this->createHttpClient($options)->get($downloadUrl);
        } catch (Throwable $e) {
            // throw new RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getMeting(): Meting
    {
        return $this->meting;
    }
}
