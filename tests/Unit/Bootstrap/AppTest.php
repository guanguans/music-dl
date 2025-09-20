<?php

/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection StaticClosureCanBeUsedInspection */
/** @noinspection PhpInternalEntityUsedInspection */
/** @noinspection PhpUnusedAliasInspection */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use Illuminate\Console\OutputStyle;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Log;

it('can get OutputStyle instance', function (): void {
    expect(app(OutputStyle::class))->toBeInstanceOf(OutputStyle::class);
})->group(__DIR__, __FILE__);

it('can get LogManager instance', function (): void {
    expect(Log::getFacadeRoot())->toBeInstanceOf(LogManager::class);
})->group(__DIR__, __FILE__);
