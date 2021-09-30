<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use Guanguans\MusicPHP\Config;
use Guanguans\MusicPHP\Contracts\AbstractEvent;
use Guanguans\MusicPHP\Exceptions\RuntimeException;
use Joli\JoliNotif\Util\OsHelper;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

if (!function_exists('config')) {
    /**
     * @param null $key
     *
     * @return \Guanguans\MusicPHP\Config|mixed
     */
    function config($key = null)
    {
        $config = new Config(require APP_PATH.'/config/config.php');
        if (null === $key) {
            return $config;
        }

        return $config->get($key);
    }
}

if (!function_exists('get_downloads_dir')) {
    /**
     * @return string
     *
     * @throws \Guanguans\MusicPHP\Exceptions\RuntimeException
     */
    function get_downloads_dir()
    {
        $downloadsDir = OsHelper::isWindows() ? 'C:\\Users\\'.get_current_user().'\\Downloads\\MusicPHP\\' : trim(exec('cd ~; pwd')).'/Downloads/MusicPHP/';

        if (!is_dir($downloadsDir) && !mkdir($downloadsDir, 0777, true) && !is_dir($downloadsDir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $downloadsDir));
        }

        return $downloadsDir;
    }
}

if (!function_exists('get_save_path')) {
    /**
     * @return string
     *
     * @throws \Guanguans\MusicPHP\Exceptions\RuntimeException
     */
    function get_save_path(array $song)
    {
        return get_downloads_dir().implode(',', $song['artist']).' - '.$song['name'].'.mp3';
    }
}

if (!function_exists('event')) {
    function event(AbstractEvent $event, $listeners)
    {
        $dispatcher = new EventDispatcher();

        is_object($listeners) and $listeners = [$listeners];

        $listeners = (array) $listeners;

        foreach ($listeners as $listener) {
            is_string($listener) && $listener = new $listener();

            if ($listener instanceof Closure) {
                $dispatcher->addListener($event->getEventName(), $listener);
            }

            if ($listener instanceof EventSubscriberInterface) {
                $dispatcher->addSubscriber($listener);

                $dispatcher->dispatch($event);

                continue;
            }

            if (method_exists($listener, 'handle')) {
                $dispatcher->addListener($event->getEventName(), [$listener, 'handle']);
            }
        }

        $dispatcher->dispatch($event, $event->getEventName());
    }
}
