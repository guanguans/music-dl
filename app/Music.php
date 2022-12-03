<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

use App\Concerns\WithHttpClient;
use App\Contracts\HttpClientFactory;
use Metowolf\Meting;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class Music implements \App\Contracts\Music, HttpClientFactory
{
    use WithHttpClient;

    public function __construct(
        protected Meting $meting,
        protected ConsoleOutput $output
    ) {
        $this->meting = $meting->format();
    }

    protected function batchCarryDownloadUrl(array $withoutUrlSongs): array
    {
        return array_reduce($withoutUrlSongs, function ($songs, $song) {
            try {
                $response = json_decode($this->meting->site($song['source'])->url($song['url_id']), true);
                if (empty($response['url'])) {
                    return $songs;
                }

                $songs[] = $song + $response;

                return $songs;
            } catch (\Throwable $e) {
                return $songs;
            }
        }, []);
    }

    public function search(string $keyword, ?array $channels = null)
    {
        if (null === $channels) {
            $songs = json_decode($this->meting->search($keyword), true);

            return $this->batchCarryDownloadUrl($songs);
        }

        $songs = array_reduce($channels, function ($songs, $channel) use ($keyword) {
            $songs[] = json_decode($this->meting->site($channel)->search($keyword), true);

            return $songs;
        }, []);

        return $this->batchCarryDownloadUrl(array_merge(...$songs));
    }

    /**
     * @psalm-suppress UnusedVariable
     */
    public function download(string $downloadUrl, string $savePath)
    {
        $options = [
            'sink' => $savePath,
            'progress' => function ($totalDownload, $downloaded) use (&$progressBar, &$isDownloaded): void {
                if ($totalDownload > 0 && $downloaded > 0 && empty($progressBar)) {
                    $progressBar = new ProgressBar($this->output, $totalDownload);
                    $progressBar->start();
                }

                if (! $isDownloaded && $progressBar && $totalDownload === $downloaded) {
                    $progressBar->finish();
                    $isDownloaded = true;
                }

                $progressBar and $progressBar->setProgress($downloaded);
            },
        ];

        return $this->createHttpClient()->get($downloadUrl, $options);
    }

    public function getMeting(): Meting
    {
        return $this->meting;
    }
}
