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

use Illuminate\Support\Collection;
use Spatie\Async\Pool;

final class AsyncMusic extends SequenceMusic
{
    /**
     * @return array<array<string, int|string>>
     *
     * @throws \JsonException
     *
     * @noinspection PhpMissingParentCallCommonInspection
     * @noinspection MissingParentCallInspection
     */
    protected function ensureWithUrl(array $withoutUrlSongs): array
    {
        $songs = tap(collect(), function (Collection $songs) use ($withoutUrlSongs): void {
            $spinner = $this->createSpinner($withoutUrlSongs);
            $pool = Pool::create()->concurrency($this->toConcurrency($withoutUrlSongs))->timeout(10);

            foreach ($withoutUrlSongs as $withoutUrlSong) {
                $pool
                    ->add(fn (): array => $this->requestUrl($withoutUrlSong))
                    ->then(static fn (array $output): Collection => tap(
                        $songs->add($withoutUrlSong + $output),
                        static function () use ($spinner): void {
                            $spinner->advance();
                        }
                    ))
                    ->catch(static function (\Throwable $throwable): void {
                        // noop
                    })
                    ->timeout(static function (): void {
                        // noop
                    });
            }

            $pool->wait();
            $spinner->finish();
        });

        return $songs->all();
    }
}
