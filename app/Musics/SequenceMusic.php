<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Musics;

class SequenceMusic extends Music
{
    /**
     * @psalm-suppress NamedArgumentNotAllowed
     */
    public function search(string $keyword, ?array $sources = null): array
    {
        if (null === $sources) {
            $songs = json_decode($this->meting->search($keyword), true, 512, JSON_THROW_ON_ERROR);

            return $this->batchCarryDownloadUrl($songs);
        }

        $songs = array_reduce($sources, function (array $songs, string $source) use ($keyword): array {
            $songs[] = json_decode($this->meting->site($source)->search($keyword), true, 512, JSON_THROW_ON_ERROR);

            return $songs;
        }, []);

        return $this->batchCarryDownloadUrl(array_merge(...$songs));
    }

    protected function batchCarryDownloadUrl(array $withoutUrlSongs): array
    {
        return array_reduce($withoutUrlSongs, function (array $songs, array $song): array {
            try {
                $response = json_decode(
                    $this->meting->site($song['source'])->url($song['url_id']),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
                if (empty($response['url'])) {
                    return $songs;
                }

                $songs[] = $song + $response;

                return $songs;
            } catch (\Throwable) {
                return $songs;
            }
        }, []);
    }
}
