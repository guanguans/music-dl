<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

/**
 * @param null $key
 *
 * @return mixed|null
 */
function config($key = '')
{
    foreach ([MUSIC_PHP_PATH.'/../../../guanguans/music-php/src/Config.php', MUSIC_PHP_PATH.'/../src/Config.php'] as $file) {
        if (file_exists($file)) {
            $config = require $file;
            break;
        }
    }

    if (!is_string($key)) {
        return;
    }

    if (empty($key)) {
        return $config;
    }

    if (!strpos($key, '.')) {
        return isset($config[$key]) ? $config[$key] : null;
    }

    $key = explode('.', $key);

    return isset($config[$key[0]][$key[1]]) ? $config[$key[0]][$key[1]] : null;
}
