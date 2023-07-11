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

use Spatie\Fork\Fork;

class ForkMusic extends SequenceMusic
{
    /**
     * @throws \JsonException
     *
     * @noinspection MissingParentCallInspection
     * @noinspection MissingParentCallInspection
     */
    protected function ensureWithUrl(array $withoutUrlSongs): array
    {
        $spinner = $this->spinner(\count($withoutUrlSongs));
        $spinner->setBarCharacter(config('console-spinner.bar_character'));
        $spinner->setMessage(config('console-spinner.message'));
        $spinner->start();

        $songs = Fork::new()
            ->before()
            ->after()
            ->concurrent($this->toConcurrency($withoutUrlSongs))
            ->run(...array_map(
                fn (array $withoutUrlSong): callable => function () use ($spinner, $withoutUrlSong): array {
                    $spinner->advance();

                    return $withoutUrlSong + $this->requestUrl($withoutUrlSong);
                },
                $withoutUrlSongs
            ));

        $spinner->finish();

        return $this->clean(collect($songs));
    }
}
