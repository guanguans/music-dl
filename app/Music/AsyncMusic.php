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
    protected function ensureWithUrls(array $withoutUrlSongs): array
    {
        return tap(collect(), function (Collection $songs) use ($withoutUrlSongs): void {
            $spinner = $this->createAndStartSpinner($withoutUrlSongs);
            $pool = Pool::create()->concurrency($this->toConcurrent($withoutUrlSongs))->timeout(10);

            foreach ($withoutUrlSongs as $withoutUrlSong) {
                $pool
                    ->add(fn (): array => $this->ensureWithUrl($withoutUrlSong))
                    ->then(static fn (array $output): Collection => tap(
                        $songs->add($output),
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
        })->all();
    }
}
