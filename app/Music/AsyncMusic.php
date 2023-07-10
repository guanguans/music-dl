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

class AsyncMusic extends SequenceMusic
{
    /**
     * @return array<int, array>
     */
    protected function ensureWithUrl(array $withoutUrlSongs): array
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
                        $this->output->writeln($throwable->getMessage());
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
