<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use LaravelZero\Framework\Components\Updater\Strategy\GithubStrategy;

return [
    /*
    |--------------------------------------------------------------------------
    | Self-updater Strategy
    |--------------------------------------------------------------------------
    |
    | Here you may specify which update strategy class you wish to use when
    | updating your application via the "self-update" command. This must
    | be a class that implements the StrategyInterface from Humbug.
    |
    */

    'strategy' => GithubStrategy::class,
];
