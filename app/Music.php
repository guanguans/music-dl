<?php

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
use Spatie\Async\Pool;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use Throwable;

class Music implements \App\Contracts\Music, HttpClientFactory
{
    use WithHttpClient;

    public function __construct(
        protected Meting $meting,
        protected ConsoleOutput $output
    ) {
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

    public function searchCarryDownloadUrlConcurrent(string $keyword, ?array $channels = null)
    {
        $songs = transform($this->searchConcurrent($keyword, $channels), function ($songs) {
            $pool = Pool::create()->concurrency(256)->timeout(5);
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
                        $this->output->writeln($e->getMessage());
                    })
                    ->timeout(function () {
                        // noop
                    });
            }
            $pool->wait();

            return $songs;
        });

        return array_values(array_filter((array) $songs, function (array $song) {
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

    public function searchConcurrent(string $keyword, ?array $channels = null)
    {
        if (is_null($channels)) {
            return json_decode($this->meting->search($keyword), true);
        }

        return value(function () use ($keyword, $channels) {
            $songs = [];

            $pool = Pool::create()->concurrency(8)->timeout(3);
            foreach ($channels as $channel) {
                $pool->add(function () use ($keyword, $channel) {
                    $response = $this->meting->site($channel)->search($keyword);

                    return json_decode($response, true);
                }, 102400)
                    ->then(function ($output) use (&$songs) {
                        $songs = array_merge($songs, $output);
                    })
                    ->catch(function (Throwable $e) {
                        $this->output->writeln($e->getMessage());
                    })
                    ->timeout(function () {
                        // noop
                    });
            }
            $pool->wait();

            return $songs;
        });
    }

    public function download(string $downloadUrl, string $savePath)
    {
        $options = [
            'sink' => $savePath,
            'progress' => function ($totalDownload, $downloaded) use (&$progressBar, &$isDownloaded) {
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
