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
use App\Support\Meting;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Traits\Macroable;
use Symfony\Component\Console\Helper\ProgressBar;

class SequenceMusic implements \App\Contracts\HttpClientFactory, \App\Contracts\Music
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

    /**
     * @psalm-suppress UnusedVariable
     */
    public function download(string $url, string $savePath): void
    {
        $options = [
            'sink' => $savePath,
            'progress' => function (int $totalDownload, int $downloaded) use (&$progressBar, &$isDownloaded): void {
                if ($totalDownload > 0 && $downloaded > 0 && ! $progressBar instanceof ProgressBar) {
                    $progressBar = new ProgressBar($this->output, $totalDownload);
                    $progressBar->start();
                }

                if (! $isDownloaded && $progressBar && $totalDownload === $downloaded) {
                    $progressBar->finish();
                    $isDownloaded = true;
                }

                $progressBar and $progressBar->setProgress($downloaded);
            },
        ];

        $this->createHttpClient()->get($url, $options);
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

        return $songs
            ->filter(static fn (array $song): bool => ! empty($song['url']))
            ->values()
            ->all();
    }
}
