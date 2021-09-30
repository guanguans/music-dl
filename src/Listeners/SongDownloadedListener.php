<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPHP\Listeners;

use Guanguans\MusicPHP\Contracts\AbstractEvent;
use Guanguans\MusicPHP\Contracts\ListenerInterface;
use Symfony\Component\Console\Output\ConsoleOutput;

class SongDownloadedListener implements ListenerInterface
{
    /**
     * SongDownloadedListener constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed|void
     */
    public function handle(AbstractEvent $event)
    {
        $output = new ConsoleOutput();
        $output->writeln(config('splitter'));
    }
}
