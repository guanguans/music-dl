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

use App\Concerns\HttpClientFactory;
use App\Contracts\Music;
use App\Support\Meting;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Traits\Macroable;
use Laravel\Prompts\Progress;

use function Laravel\Prompts\progress;

class SequenceMusic implements \App\Contracts\HttpClientFactory, Music
{
    use HttpClientFactory;
    use Macroable;

    public function __construct(
        protected Meting $meting,
        protected OutputStyle $output
    ) {
        $this->meting = $meting->format();
    }

    /**
     * @psalm-suppress NamedArgumentNotAllowed
     *
     * @throws \JsonException
     */
    public function search(string $keyword, array $sources = []): array
    {
        $withoutUrlSongs = collect($sources)
            ->map(fn (string $source): array => json_decode(
                (string) $this->meting->site($source)->search($keyword),
                true,
                512,
                JSON_THROW_ON_ERROR
            ))
            ->collapse()
            ->all();

        return collect($this->ensureWithUrls($withoutUrlSongs))
            ->filter()
            ->filter(static fn (array $song): bool => ! empty($song['url']))
            ->values()
            ->all();
    }

    /**
     * @psalm-suppress UnusedVariable
     *
     * @throws GuzzleException
     */
    public function download(string $url, string $savePath): void
    {
        $this->createHttpClient()->get($url, [
            'sink' => $savePath,
            'progress' => static function (int $totalDownload, int $downloaded) use (&$progress, $savePath): void {
                if (0 === $totalDownload || 0 === $downloaded || 'submit' === $progress?->state) {
                    return;
                }

                if (! $progress instanceof Progress) {
                    $progress = progress($savePath, $totalDownload);
                    $progress->start();
                }

                $progress->progress = $downloaded;
                $progress->advance(0);

                if ($totalDownload === $downloaded) {
                    $progress->finish();
                }
            },
        ]);
    }

    /**
     * @throws \JsonException
     */
    protected function ensureWithUrls(array $withoutUrlSongs): array
    {
        return collect($withoutUrlSongs)
            ->transform(fn (array $withoutUrlSong): array => $this->ensureWithUrl($withoutUrlSong))
            ->all();
    }

    /**
     * @throws \JsonException
     */
    protected function ensureWithUrl(array $withoutUrlSong): array
    {
        return $withoutUrlSong + $this->requestUrl($withoutUrlSong);
    }

    /**
     * @throws \JsonException
     */
    protected function requestUrl(array $song): array
    {
        return (array) json_decode(
            (string) $this->meting->site($song['source'])->url($song['url_id']),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    protected function toConcurrent(array $withoutUrlSongs): int
    {
        return min(\count($withoutUrlSongs), 128);
    }
}
