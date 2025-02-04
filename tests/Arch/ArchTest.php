<?php

/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection StaticClosureCanBeUsedInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace Tests;

arch('will not use debugging functions')
    // ->skip()
    ->expect([
        'dd',
        'die',
        'dump',
        'echo',
        'exit',
        'print',
        'print_r',
        'printf',
        'ray',
        'var_dump',
        'var_export',
        'vprintf',
    ])
    ->each->not->toBeUsed();
