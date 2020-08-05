<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPHP\Contracts;

/**
 * Interface MusicInterface.
 */
interface MusicInterface
{
    /**
     * @return mixed
     */
    public function search(string $platform, string $keyword);

    /**
     * @return mixed
     */
    public function download(array $song);
}
