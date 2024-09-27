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
use Illuminate\Support\Facades\Concurrency;
use Illuminate\Support\Timebox;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Dumpable;
use Illuminate\Support\Traits\Localizable;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Traits\Tappable;
use Laravel\Prompts\Progress;
use function Laravel\Prompts\progress;

class Music implements Contracts\HttpClientFactory, Contracts\Music
{
    use HttpClientFactory;
    use Macroable;
    use Dumpable;
    use Conditionable;
    use Tappable;
    use Localizable;

    public function __construct(
        private ?Meting $meting = null,
        private ?Driver $driver = null,
        private ?Timebox $timebox = null,
    ) {
        $this->meting ??= new Meting;
        $this->driver ??= Concurrency::driver();
        $this->timebox ??= new Timebox;
    }

    /**
     * @psalm-suppress NamedArgumentNotAllowed
     *
     * @throws \Throwable
     */
    public function search(string $keyword, array $sources = []): Collection
    {
        return $this->timebox->call(
            fn (): Collection => collect($sources)
                ->map(fn (string $source): array => json_decode(
                    (string) $this->meting->site($source)->search($keyword),
                    true,
                    512,
                    \JSON_THROW_ON_ERROR
                ))
                ->collapse()
                ->pipe(fn (Collection $songs): Collection => $this->ensureWithUrls($songs))
                ->sortBy([
                    ['name', 'asc'],
                    ['artist', 'asc'],
                    ['size', 'desc'],
                    ['br', 'desc'],
                    ['album', 'asc'],
                    ['source', 'asc'],
                ])
                ->values()
                ->mapWithKeys(static fn (array $song, int $index): array => [$index + 1 => $song]),
            3820 * 1000
        );
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

    public function setDriver(Driver $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    private function ensureWithUrls(Collection $songs): Collection
    {
        return collect($this->driver->run(
            $songs->map(fn (array $song): callable => fn (): array => $song + (array) json_decode(
                (string) $this->meting->site($song['source'])->url($song['url_id']),
                true,
                512,
                \JSON_THROW_ON_ERROR
            ))->all()
        ))
            ->filter()
            ->filter(static fn (array $song): bool => !empty($song['url']));
    }
}
