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

use Guanguans\MusicPHP\Events\SongDownloadBeforeEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LogSubscriber implements EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            SongDownloadBeforeEvent::class => ['log', 256],
        ];
    }

    /**
     * @throws \Guanguans\MusicPHP\Exceptions\RuntimeException
     */
    public function log(SongDownloadBeforeEvent $event)
    {
        file_put_contents(
            sprintf('%s/music.log', get_downloads_dir()),
            var_export($event->song, true).PHP_EOL,
            FILE_APPEND
        );
    }
}
