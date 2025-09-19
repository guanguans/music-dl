<?php

/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection StaticClosureCanBeUsedInspection */
/** @noinspection DebugFunctionUsageInspection */
/** @noinspection ForgottenDebugOutputInspection */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use App\Support\ServerDumper;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\ContextProviderInterface;

it('can get getContextProviders', function (): void {
    expect(new ServerDumper(config('services.var_dump_server.host'), new CliDumper))
        ->toBeInstanceOf(ServerDumper::class);

    expect(new ServerDumper(config('services.var_dump_server.host')))
        ->getContextProviders()->toBeArray()
        ->each->toBeInstanceOf(ContextProviderInterface::class);

    dump(true);
})->group(__DIR__, __FILE__);
