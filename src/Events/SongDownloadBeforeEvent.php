<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPHP\Events;

use Guanguans\MusicPHP\Contracts\AbstractEvent;

class SongDownloadBeforeEvent extends AbstractEvent
{
    const NAME = 'song.download.before';

    public $song;

    /**
     * SongDownloadedEvent constructor.
     */
    public function __construct(array $song)
    {
        $this->song = $song;
    }

    /**
     * @return string
     */
    public function getEventName()
    {
        return self::NAME;
    }
}
