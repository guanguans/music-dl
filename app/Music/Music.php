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

use App\Concerns\HasHttpClient;
use App\Contracts\HttpClientFactory;
use Metowolf\Meting;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

abstract class Music implements \App\Contracts\Music, HttpClientFactory
{
    use HasHttpClient;

    public function __construct(
        protected Meting $meting,
        protected ConsoleOutput $consoleOutput
    ) {
        $this->meting = $meting->format();
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
                    $progressBar = new ProgressBar($this->consoleOutput, $totalDownload);
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
}
