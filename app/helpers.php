<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use App\Exceptions\RuntimeException;
use Joli\JoliNotif\Util\OsHelper;

if (!function_exists('get_downloads_dir')) {
    /**
     * @throws \App\Exceptions\RuntimeException
     */
    function get_downloads_dir(): string
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
     * @throws \App\Exceptions\RuntimeException
     */
    function get_save_path(array $song): string
    {
        return get_downloads_dir().implode(',', $song['artist']).' - '.$song['name'].'.mp3';
    }
}
