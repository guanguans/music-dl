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

class SequenceMusic extends Music
{
    /**
     * @psalm-suppress NamedArgumentNotAllowed
     */
    public function search(string $keyword, array $sources = []): array
    {
        $songs = collect($sources)
            ->map(fn (string $source): array => json_decode(
                $this->meting->site($source)->search($keyword),
                true,
                512,
                JSON_THROW_ON_ERROR
            ))
            ->collapse()
            ->all();

        return $this->ensureWithUrl($songs);
    }

    protected function ensureWithUrl(array $withoutUrlSongs): array
    {
        $songs = collect();

        $this->withSpinner(
            $withoutUrlSongs,
            function (array $song) use ($songs): void {
                $songs->add($song + json_decode(
                    $this->meting->site($song['source'])->url($song['url_id']),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                ));
            },
            '<comment>searching...</comment>',
            ['bar_character' => '<info>✔</info>']
        );

        return $songs->filter(static fn (array $song): bool => ! empty($song['url']))->all();
    }
}
