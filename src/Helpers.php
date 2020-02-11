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
use Guanguans\MusicPHP\Exceptions\RuntimeException;
use Joli\JoliNotif\Util\OsHelper;

if (!function_exists('config')) {
    /**
     * @param null $key
     *
     * @return \Guanguans\MusicPHP\Config|mixed
     */
    function config($key = null)
    {
        $config = new Config(require __DIR__.'/../config/config.php');
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
        $downloadsDir = OsHelper::isWindows() ? 'C:\\Users\\'.get_current_user().'\\Downloads\\' : trim(exec('cd ~; pwd')).'/Downloads/';

        if (!is_dir($downloadsDir) && !mkdir($downloadsDir, 0777, true) && !is_dir($downloadsDir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $downloadsDir));
        }

        return $downloadsDir;
    }
}
