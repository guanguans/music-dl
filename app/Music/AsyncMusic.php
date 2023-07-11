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
use Rahul900Day\LaravelConsoleSpinner\Spinner;
use Spatie\Async\Pool;

class AsyncMusic extends SequenceMusic
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
            tap(
                $this->spinner(\count($withoutUrlSongs)),
                function (Spinner $spinner) use ($withoutUrlSongs, $songs): void {
                    $spinner->setBarCharacter(config('console-spinner.bar_character'));
                    $spinner->setMessage(config('console-spinner.message'));
                    $spinner->start();

                    tap(
                        Pool::create()->concurrency(min(\count($withoutUrlSongs), 128))->timeout(10),
                        function (Pool $pool) use ($withoutUrlSongs, $songs, $spinner): void {
                            foreach ($withoutUrlSongs as $song) {
                                $pool
                                    ->add(fn (): array => json_decode(
                                        $this->meting->site($song['source'])->url($song['url_id']),
                                        true,
                                        512,
                                        JSON_THROW_ON_ERROR
                                    ))
                                    ->then(static function (array $output) use ($songs, $song, $spinner): void {
                                        $songs->add($song + $output);
                                        $spinner->advance();
                                    })
                                    ->catch(static function (\Throwable $throwable): void {
                                        // noop
                                    })
                                    ->timeout(static function (): void {
                                        // noop
                                    });
                            }
                            $pool->wait();
                        }
                    );

                    $spinner->finish();
                }
            );
        });

        return $this->clean($songs);
    }
}
