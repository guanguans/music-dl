<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

return [
    'logo' => sprintf(<<<'logo'
        <fg=green;options=bold>
             __  __           _        _____  _
            |  \/  |         (_)      |  __ \| |
            | \  / |_   _ ___ _  ___  | |  | | |
            | |\/| | | | / __| |/ __| | |  | | |
            | |  | | |_| \__ \ | (__  | |__| | |____
            |_|  |_|\__,_|___/_|\___| |_____/|______| %s
        </>
        logo, config('app.version')),

    'sources' => [
        'tencent',
        'netease',
        'kugou',
        // 'baidu',
        // 'kuwo',
        // 'xiami',
    ],
];
