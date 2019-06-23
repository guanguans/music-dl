<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use Guanguans\MusicPhp\Config;

if (!function_exists('config')) {
    /**
     * @param null $key
     *
     * @return \Guanguans\MusicPhp\Config|mixed
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
