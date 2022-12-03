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

use Spatie\Async\Pool;

class ConcurrencyMusic extends Music
{
    /**
     * @return array<int, array>
     */
    protected function batchCarryDownloadUrl(array $withoutUrlSongs): array
    {
        $songs = transform($withoutUrlSongs, function (array $songs) {
            $pool = Pool::create()->concurrency(128)->timeout(5);
            foreach ($songs as &$song) {
                $pool
                    ->add(function () use ($song) {
                        try {
                            return json_decode($this->meting->site($song['source'])->url($song['url_id']), true);
                        } catch (\Throwable $e) {
                            return [];
                        }
                    })
                    ->then(function ($output) use (&$song): void {
                        $song = $song + $output;
                    })
                    ->catch(function (\Throwable $e): void {
                        $this->consoleOutput->writeln($e->getMessage());
                    })
                    ->timeout(function (): void {
                        // noop
                    });
            }
            $pool->wait();

            return $songs;
        });

        return array_values(
            array_filter((array) $songs, static fn (array $song): bool => ! empty($song['url']))
        );
    }

    /**
     * @return array<int, array>
     */
    public function search(string $keyword, ?array $channels = null): array
    {
        if (null === $channels) {
            $songs = json_decode($this->meting->search($keyword), true, 512, JSON_THROW_ON_ERROR);

            return $this->batchCarryDownloadUrl($songs);
        }

        $songs = value(function () use ($keyword, $channels): array {
            $songs = [];

            $pool = Pool::create()->concurrency(8)->timeout(3);
            foreach ($channels as $channel) {
                $pool
                    ->add(fn () => json_decode($this->meting->site($channel)->search($keyword), true), 102400)
                    ->then(function (array $output) use (&$songs): void {
                        $songs[] = $output;
                    })
                    ->catch(function (\Throwable $e): void {
                        $this->consoleOutput->writeln($e->getMessage());
                    })
                    ->timeout(function (): void {
                        // noop
                    });
            }
            $pool->wait();

            return array_merge(...$songs);
        });

        return $this->batchCarryDownloadUrl($songs);
    }
}
