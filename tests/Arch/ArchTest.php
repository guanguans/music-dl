<?php

/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
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

/**
 * Copyright (c) 2021-2025 guanguans<ityaozm@gmail.com>.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/laravel-skeleton
 */
arch()->group(__DIR__, __FILE__)->preset()->php()->ignoring([
    'debug_backtrace',
]);

arch()->group(__DIR__, __FILE__)->preset()->security()->ignoring([
    'array_rand',
    'assert',
    'exec',
    'tempnam',
]);

arch()->group(__DIR__, __FILE__)->skip()->preset()->laravel()->ignoring([
]);

arch()->group(__DIR__, __FILE__)->skip()->preset()->strict()->ignoring([
]);

arch()->group(__DIR__, __FILE__)->skip()->preset()->relaxed()->ignoring([
]);

arch('will not use debugging functions')
    // ->throwsNoExceptions()
    ->group(__DIR__, __FILE__)
    ->expect([
        'dd',
        'die',
        'dump',
        'echo',
        'env',
        'env_explode',
        'env_getcsv',
        'exit',
        'print',
        'print_r',
        'printf',
        'ray',
        'trap',
        'var_dump',
        'var_export',
        'vprintf',
    ])
    // ->each
    ->not->toBeUsed()
    ->ignoring([
    ]);
