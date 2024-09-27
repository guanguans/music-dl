<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Support;

class Meting extends \Metowolf\Meting
{
    /** @noinspection ClassOverridesFieldOfSuperClassInspection */
    protected array $temp = [];

    public function __construct($value = 'netease')
    {
        parent::__construct($value);
        $this->format();
    }
}
