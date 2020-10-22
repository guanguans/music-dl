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
use Guanguans\MusicPHP\Contracts\EventContract;
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
    function event(EventContract $event, $listeners)
    {
        $dispatcher = new EventDispatcher();

        if ($listeners instanceof Closure) {
            $dispatcher->addListener($event->getEventName(), $listeners);
            $dispatcher->dispatch($event, $event->getEventName());
        }

        if ($listeners instanceof EventSubscriberInterface) {
            $dispatcher->addSubscriber($listeners);
            $dispatcher->dispatch($event);
        }

        if (is_string($listeners)) {
            $listeners = [$listeners];
        }

        foreach ($listeners as $listener) {
            $dispatcher->addListener($event->getEventName(), [new $listener(), 'handle']);
            $dispatcher->dispatch($event, $event->getEventName());
        }
    }
}
