<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App;

use Spatie\Async\Pool;
use Throwable;

class ConcurrencyMusic extends Music
{
    protected function batchCarryDownloadUrl(array $withoutUrlSongs): array
    {
        $songs = transform($withoutUrlSongs, function ($songs) {
            $pool = Pool::create()->concurrency(256)->timeout(5);
            foreach ($songs as &$song) {
                $pool
                    ->add(function () use ($song) {
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
            $songs = json_decode($this->meting->search($keyword), true);

            return $this->batchCarryDownloadUrl($songs);
        }

        $songs = value(function () use ($keyword, $channels) {
            $songs = [];

            $pool = Pool::create()->concurrency(8)->timeout(3);
            foreach ($channels as $channel) {
                $pool
                    ->add(function () use ($keyword, $channel) {
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

        return $this->batchCarryDownloadUrl($songs);
    }
}
