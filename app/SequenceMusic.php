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

use App\Concerns\HasHttpClient;
use App\Contracts\HttpClientFactory;
use Metowolf\Meting;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class SequenceMusic implements Contracts\Music, HttpClientFactory
{
    use HasHttpClient;

    public function __construct(
        protected Meting $meting,
        protected ConsoleOutput $consoleOutput
    ) {
        $this->meting = $meting->format();
    }

    /**
     * @psalm-suppress NamedArgumentNotAllowed
     */
    public function search(string $keyword, ?array $channels = null): array
    {
        if (null === $channels) {
            $songs = json_decode($this->meting->search($keyword), true, 512, JSON_THROW_ON_ERROR);

            return $this->batchCarryDownloadUrl($songs);
        }

        $songs = array_reduce($channels, function (array $songs, string $channel) use ($keyword): array {
            $songs[] = json_decode($this->meting->site($channel)->search($keyword), true, 512, JSON_THROW_ON_ERROR);

            return $songs;
        }, []);

        return $this->batchCarryDownloadUrl(array_merge(...$songs));
    }

    /**
     * @psalm-suppress UnusedVariable
     */
    public function download(string $url, string $savePath): void
    {
        $options = [
            'sink' => $savePath,
            'progress' => function (int $totalDownload, int $downloaded) use (&$progressBar, &$isDownloaded): void {
                if ($totalDownload > 0 && $downloaded > 0 && ! $progressBar instanceof ProgressBar) {
                    $progressBar = new ProgressBar($this->consoleOutput, $totalDownload);
                    $progressBar->start();
                }

                if (! $isDownloaded && $progressBar && $totalDownload === $downloaded) {
                    $progressBar->finish();
                    $isDownloaded = true;
                }

                $progressBar and $progressBar->setProgress($downloaded);
            },
        ];

        $this->createHttpClient()->get($url, $options);
    }

    protected function batchCarryDownloadUrl(array $withoutUrlSongs): array
    {
        return array_reduce($withoutUrlSongs, function (array $songs, array $song): array {
            try {
                $response = json_decode(
                    $this->meting->site($song['source'])->url($song['url_id']),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
                if (empty($response['url'])) {
                    return $songs;
                }

                $songs[] = $song + $response;

                return $songs;
            } catch (\Throwable) {
                return $songs;
            }
        }, []);
    }
}
