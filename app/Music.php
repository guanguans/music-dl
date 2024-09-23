<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App;

use App\Concerns\HttpClientFactory;
use App\Support\Meting;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Concurrency\Driver;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;
use Laravel\Prompts\Progress;
use function Laravel\Prompts\progress;

class Music implements Contracts\HttpClientFactory, Contracts\Music
{
    use HttpClientFactory;
    use Macroable;

    public function __construct(protected Meting $meting, protected Driver $driver)
    {
        $this->meting = $meting->format();
    }

    /**
     * @psalm-suppress NamedArgumentNotAllowed
     */
    public function search(string $keyword, array $sources = []): Collection
    {
        $withoutUrlSongs = collect($sources)
            ->map(fn (string $source): array => json_decode(
                (string) $this->meting->site($source)->search($keyword),
                true,
                512,
                \JSON_THROW_ON_ERROR
            ))
            ->collapse()
            ->all();

        return collect($this->ensureWithUrls($withoutUrlSongs))
            ->filter()
            ->filter(static fn (array $song): bool => !empty($song['url']))
            ->sortBy([
                ['name', 'asc'],
                ['artist', 'asc'],
                ['size', 'desc'],
                ['br', 'desc'],
                ['album', 'asc'],
                ['source', 'asc'],
            ])
            ->values()
            ->mapWithKeys(static fn (array $song, int $index): array => [$index + 1 => $song]);
    }

    /**
     * @psalm-suppress UnusedVariable
     *
     * @throws GuzzleException
     */
    public function download(string $url, string $savedPath): void
    {
        $this->createHttpClient()->get($url, [
            'sink' => $savedPath,
            'progress' => static function (int $totalDownload, int $downloaded) use (&$progress, $savedPath): void {
                if (0 === $totalDownload || 0 === $downloaded || 'submit' === $progress?->state) {
                    return;
                }

                if (!$progress instanceof Progress) {
                    /** @noinspection PhpVoidFunctionResultUsedInspection */
                    $progress = tap(progress($savedPath, $totalDownload))->start();
                }

                value(static function (Progress $progress, int $downloaded): void {
                    $progress->progress = $downloaded;
                    $progress->advance(0);
                }, $progress, $downloaded);

                if ($totalDownload === $downloaded) {
                    $progress->finish();
                }
            },
        ]);
    }

    protected function ensureWithUrls(array $withoutUrlSongs): array
    {
        return $this->driver->run(array_map(
            fn (array $withoutUrlSong): callable => fn (): array => $this->ensureWithUrl($withoutUrlSong),
            $withoutUrlSongs
        ));
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
            \JSON_THROW_ON_ERROR
        );
    }
}
