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

final class ForkMusic extends SequenceMusic
{
    /**
     * @throws \JsonException
     *
     * @noinspection MissingParentCallInspection
     * @noinspection MissingParentCallInspection
     */
    protected function ensureWithUrls(array $withoutUrlSongs): array
    {
        $spinner = $this->createAndStartSpinner($withoutUrlSongs);

        $songs = Fork::new()
            ->before()
            ->after()
            ->concurrent($this->toConcurrent($withoutUrlSongs))
            ->run(...array_map(
                fn (array $withoutUrlSong): callable => fn (): array => tap(
                    $this->ensureWithUrl($withoutUrlSong),
                    static function () use ($spinner): void {
                        $spinner->advance();
                    }
                ),
                $withoutUrlSongs
            ));

        $spinner->finish();

        return $songs;
    }
}
