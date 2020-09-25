<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPHP;

use Guanguans\MusicPHP\Contracts\MusicInterface;
use Guanguans\MusicPHP\Exceptions\Exception;
use GuzzleHttp\Client;
use Metowolf\Meting;
use Spatie\Async\Pool;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class Music.
 */
class Music implements MusicInterface
{
    protected $platforms = ['tencent', 'netease', 'xiami', 'kugou'];

    protected $hideFields = ['id', 'pic_id', 'url_id', 'lyric_id', 'url'];

    protected $guzzleOptions = [];

    protected $serializedOutput = 1024 * 100;

    /**
     * Music constructor.
     */
    public function __construct()
    {
    }

    public function searchAll(string $keyword): array
    {
        $songAll = [];
        $pool = Pool::create();
        foreach ($this->platforms as $platform) {
            $pool->add(function () use ($platform, $keyword) {
                return $this->search($platform, $keyword);
            }, $this->getSerializedOutput())->then(function ($output) use (&$songAll) {
                $songAll = array_merge($songAll, $output);
            })->catch(function (\Throwable $exception) {
                exit($exception->getMessage());
            });
        }
        $pool->wait();

        return $songAll;
    }

    /**
     * @return mixed
     */
    public function search(string $platform, string $keyword)
    {
        $meting = $this->getMeting($platform);
        $songs = json_decode($meting->format()->search($keyword), true);

        $pool = Pool::create()->concurrency(128)->timeout(5);
        foreach ($songs as $key => &$song) {
            $pool->add(function () use ($meting, $song) {
                return json_decode($meting->format()->url($song['url_id']), true);
            })->then(function ($output) use (&$songs, &$song, $key) {
                $song = array_merge($song, $output);
                if (empty($song['url'])) {
                    unset($songs[$key]);
                }
            })->catch(function (\Throwable $exception) use (&$songs, $key) {
                // do something: Exception log $exception->getMessage()
                unset($songs[$key]);
            })->timeout(function () use (&$songs, $key) {
                // do something: Timeout log
                unset($songs[$key]);
            });
        }
        unset($song);
        $pool->wait();

        return $songs;
    }

    public function getMeting(string $platform): Meting
    {
        return new Meting($platform);
    }

    public function formatAll(array $songs, string $keyword): array
    {
        foreach ($songs as $key => &$song) {
            $song = $this->format($song, $keyword);
            array_unshift($song, "<fg=cyan>$key</>");
        }

        unset($song);

        return $songs;
    }

    public function format(array $song, string $keyword): array
    {
        foreach ($this->hideFields as $hideField) {
            unset($song[$hideField]);
        }

        $song['name'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['name']);
        $song['album'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['album']);
        $song['artist'] = implode(',', $song['artist']);
        $song['artist'] = str_replace($keyword, "<fg=red;options=bold>$keyword</>", $song['artist']);
        $song['size'] = '<fg=yellow>'.sprintf('%.1f', $song['size'] / 1048576).'M</>';

        return $song;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Guanguans\MusicPHP\Exceptions\Exception
     */
    public function download(array $song)
    {
        try {
            $progressBar = null;
            $isDownloaded = false;
            $this->setGuzzleOptions([
                'sink' => get_save_path($song),
                'progress' => function ($totalDownload, $downloaded) use (&$progressBar, &$isDownloaded) {
                    $output = new ConsoleOutput();
                    if ($totalDownload > 0 && $downloaded > 0 && null === $progressBar) {
                        $progressBar = new ProgressBar($output, $totalDownload);
                        $progressBar->setFormat('very_verbose');
                        $progressBar->start();
                    }
                    if (!$isDownloaded && $progressBar && $totalDownload === $downloaded) {
                        $progressBar->finish();
                        $output->writeln(PHP_EOL);

                        return $isDownloaded = true;
                    }
                    if ($progressBar) {
                        $progressBar->setProgress($downloaded);
                    }
                },
            ]);

            return $this->getHttpClient()->get($song['url']);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getHttpClient(): Client
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    /**
     * @return float|int
     */
    public function getSerializedOutput()
    {
        return $this->serializedOutput;
    }

    /**
     * @param float|int $serializedOutput
     */
    public function setSerializedOutput($serializedOutput): void
    {
        $this->serializedOutput = $serializedOutput;
    }
}
