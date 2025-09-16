<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
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
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Support\Traits\Localizable;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Traits\Tappable;
use Laravel\Prompts\Progress;
use Psr\Http\Message\ResponseInterface;
use function Laravel\Prompts\progress;

final class Music implements Contracts\HttpClientFactory, Contracts\Music
{
    use Conditionable;
    use Dumpable;
    use ForwardsCalls;
    use HttpClientFactory;
    use Localizable;
    use Macroable;
    use Tappable;

    public function __construct(
        private Meting $meting = new Meting,
        private ?Driver $driver = null,
        private readonly Timebox $timebox = new Timebox,
        private int $minCallMicroseconds = 3820 * 1000,
    ) {
        $this->driver ??= Concurrency::driver();
    }

    /**
     * @throws \Throwable
     */
    public function search(string $keyword, array $sources): Collection
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
                // ->sortBy([
                //     // ['name', \SORT_ASC],
                //     // ['name', \SORT_FLAG_CASE],
                //     ['name', 'asc'],
                //     ['artist', 'asc'],
                //     ['size', 'desc'],
                //     ['br', 'desc'],
                //     ['album', 'asc'],
                //     ['source', 'asc'],
                // ])
                ->values()
                ->mapWithKeys(static fn (array $song, int $index): array => [$index + 1 => $song]),
            $this->minCallMicroseconds
        );
    }

    /**
     * @throws \Throwable
     * @throws GuzzleException
     */
    public function download(string $url, string $savedPath): void
    {
        $this->timebox->call(
            fn (): ResponseInterface => $this->createHttpClient()->get($url, [
                'sink' => $savedPath,
                'progress' => static function (int $totalDownload, int $downloaded) use (&$progress, $savedPath): void {
                    if (0 === $totalDownload || 0 === $downloaded || 'submit' === $progress?->state) {
                        return;
                    }

                    // @codeCoverageIgnoreStart
                    if (!$progress instanceof Progress) {
                        /** @noinspection PhpVoidFunctionResultUsedInspection */
                        $progress = tap(progress($savedPath, $totalDownload))->start();
                    }

                    if ($totalDownload === $downloaded) {
                        $progress->finish();
                    }

                    $progress->progress = $downloaded;
                    $progress->render();
                    // @codeCoverageIgnoreEnd
                },
            ]),
            $this->minCallMicroseconds
        );
    }

    public function setMeting(Meting $meting): self
    {
        $this->meting = $meting;

        return $this;
    }

    public function setDriver(Driver $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function setMinCallMicroseconds(int $minCallMicroseconds): self
    {
        $this->minCallMicroseconds = $minCallMicroseconds;

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
            ->reject(static fn (array $song): bool => empty($song['url']));
    }
}
