<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

use Metowolf\Meting;
use Spatie\Async\Pool;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use Throwable;

class Music implements MusicInterface, HttpClientFactoryInterface
{
    use WithHttpClient;

    protected Meting $meting;

    public function __construct(Meting $meting)
    {
        $this->meting = $meting->format();
    }

    public function searchCarryDownloadUrl(string $keyword, ?array $channels = null)
    {
        return array_reduce($this->search($keyword, $channels), function ($songs, $song) {
            try {
                $response = json_decode($this->meting->site($song['source'])->url($song['url_id']), true);
                if (empty($response['url'])) {
                    return $songs;
                }

                $songs[] = array_merge($song, $response);

                return $songs;
            } catch (Throwable $e) {
                return $songs;
            }
        }, []);
    }

    public function searchCarryDownloadUrlAsync(string $keyword, ?array $channels = null)
    {
        $songs = $this->searchAsync($keyword, $channels);

        tap(Pool::create()->concurrency(256)->timeout(5), function (Pool $pool) use (&$songs) {
            foreach ($songs as &$song) {
                $pool->add(function () use ($song) {
                    try {
                        $response = json_decode($this->meting->site($song['source'])->url($song['url_id']), true);

                        return array_merge($song, $response);
                    } catch (Throwable $e) {
                        return $song;
                    }
                })
                    ->then(function ($output) use (&$song) {
                        $song = $output;
                    })
                    ->catch(function (Throwable $e) {
                        dump($e->getMessage());
                    })
                    ->timeout(function () {
                        // noop
                    });
            }
            unset($song);
        })->wait();

        return array_values(array_filter($songs, function (array $song) {
            return ! empty($song['url']);
        }));
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

    public function searchAsync(string $keyword, ?array $channels = null)
    {
        if (is_null($channels)) {
            return json_decode($this->meting->search($keyword), true);
        }

        tap(Pool::create()->concurrency(8)->timeout(3), function (Pool $pool) use (&$songs, $keyword, $channels) {
            foreach ($channels as $channel) {
                $pool->add(function () use ($keyword, $channel) {
                    $response = $this->meting->site($channel)->search($keyword);

                    return json_decode($response, true);
                }, 102400)
                    ->then(function ($output) use (&$songs) {
                        $songs = array_merge((array) $songs, $output);
                    })
                    ->catch(function (Throwable $e) {
                        dump($e->getMessage());
                    })
                    ->timeout(function () {
                        // noop
                    });
            }
        })->wait();

        return $songs;
    }

    public function download(string $downloadUrl, string $savePath)
    {
        $options = [
            'sink' => $savePath,
            'progress' => function ($totalDownload, $downloaded) use (&$progressBar, &$isDownloaded) {
                if ($totalDownload > 0 && $downloaded > 0 && empty($progressBar)) {
                    $progressBar = new ProgressBar(new ConsoleOutput(), $totalDownload);
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

    public function batchFormat(array $songs, string $keyword): array
    {
        return collect($songs)
            ->mapWithKeys(function ($song, $index) use ($keyword) {
                $song = $this->format($song, $keyword);
                array_unshift($song, "<fg=cyan>$index</>");

                return [$index => $song];
            })
            ->all();
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
