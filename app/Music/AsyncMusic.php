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
     *
     * @throws \JsonException
     *
     * @noinspection MissingParentCallInspection
     */
    protected function ensureWithUrl(array $withoutUrlSongs): array
    {
        $songs = transform($withoutUrlSongs, function (array $songs): array {
            $spinner = $this->spinner(\count($songs));
            $spinner->setBarCharacter('<info>✔</info>');
            $spinner->setMessage('<comment>searching...</comment>');
            $spinner->start();

            $pool = Pool::create()->concurrency(\count($songs))->timeout(10);
            foreach ($songs as &$song) {
                $pool
                    ->add(function () use ($song) {
                        return json_decode(
                            $this->meting->site($song['source'])->url($song['url_id']),
                            true,
                            512,
                            JSON_THROW_ON_ERROR
                        );
                    })
                    ->then(function ($output) use ($spinner, &$song): void {
                        $song += $output;
                        $spinner->advance();
                    })
                    ->catch(function (\Throwable $throwable): void {
                        // noop
                    })
                    ->timeout(static function (): void {
                        // noop
                    });
            }
            $pool->wait();

            $spinner->finish();

            return $songs;
        });

        return collect((array) $songs)
            ->filter(static fn (array $song): bool => ! empty($song['url']))
            ->values()
            ->all();
    }
}
