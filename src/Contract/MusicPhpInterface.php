<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPhp\Contract;

interface MusicPhpInterface
{
    public function search($platform, $keyword);

    public function searchAll($keyword);

    public function format(array $song, $keyword);

    public function formatAll(array $songs, $keyword);

    public function download(array $song);
}
