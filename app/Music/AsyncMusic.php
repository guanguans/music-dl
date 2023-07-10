<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Music;

use Spatie\Async\Pool;

class AsyncMusic extends Music
{
    /**
     * @return array<int, array>
     *
     * @throws \JsonException
     */
    public function search(string $keyword, ?array $sources = null): array
    {
        if (null === $sources) {
            $songs = json_decode($this->meting->search($keyword), true, 512, JSON_THROW_ON_ERROR);

            return $this->batchCarryDownloadUrl($songs);
        }

        $songs = value(function () use ($sources, $keyword): array {
            $songs = [];

            $pool = Pool::create()->concurrency(8)->timeout(3);
            foreach ($sources as $source) {
                $pool
                    ->add(fn (): mixed => json_decode($this->meting->site($source)->search($keyword), true, 512, JSON_THROW_ON_ERROR), 102400)
                    ->then(static function (array $output) use (&$songs): void {
                        $songs[] = $output;
                    })
                    ->catch(function (\Throwable $throwable): void {
                        $this->consoleOutput->writeln($throwable->getMessage());
                    })
                    ->timeout(static function (): void {
                        // noop
                    });
            }
            $pool->wait();

            return array_merge(...$songs);
        });

        return $this->batchCarryDownloadUrl($songs);
    }

    /**
     * @return array<int, array>
     */
    protected function batchCarryDownloadUrl(array $withoutUrlSongs): array
    {
        $songs = transform($withoutUrlSongs, function (array $songs): array {
            $pool = Pool::create()->concurrency(128)->timeout(5);
            foreach ($songs as &$song) {
                $pool
                    ->add(function () use ($song) {
                        try {
                            return json_decode($this->meting->site($song['source'])->url($song['url_id']), true, 512, JSON_THROW_ON_ERROR);
                        } catch (\Throwable) {
                            return [];
                        }
                    })
                    ->then(function ($output) use (&$song): void {
                        $song += $output;
                    })
                    ->catch(function (\Throwable $throwable): void {
                        $this->consoleOutput->writeln($throwable->getMessage());
                    })
                    ->timeout(static function (): void {
                        // noop
                    });
            }
            $pool->wait();

            return $songs;
        });

        return array_values(array_filter((array) $songs, static fn (array $song): bool => ! empty($song['url'])));
    }
}
