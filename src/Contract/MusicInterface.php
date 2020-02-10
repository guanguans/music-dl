<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPHP\Contract;

interface MusicInterface
{
    /**
     * @param $platform
     * @param $keyword
     *
     * @return mixed
     */
    public function search($platform, $keyword);

    /**
     * @param $keyword
     *
     * @return mixed
     */
    public function searchAll($keyword);

    /**
     * @param array $song
     * @param $keyword
     *
     * @return mixed
     */
    public function format(array $song, $keyword);

    /**
     * @param array $songs
     * @param $keyword
     *
     * @return mixed
     */
    public function formatAll(array $songs, $keyword);

    /**
     * @param array $song
     *
     * @return mixed
     */
    public function download(array $song);
}
