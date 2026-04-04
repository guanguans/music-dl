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
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use App\Commands\InspireCommand;
use Illuminate\Support\Facades\Artisan;

it('can inspire Artisan', function (): void {
    $this->artisan(InspireCommand::class, ['name' => 'Artisan'])->assertOk();
})->group(__DIR__, __FILE__);

it('use `--configuration` and `--xdebug` options ', function (): void {
    Artisan::call(InspireCommand::class, [
        'name' => 'Artisan',
        '--configuration' => [
            'app.name=guanguans',
            'app.debug=false',
        ],
        '--xdebug' => true,
    ]);
    // echo Artisan::output();
})->group(__DIR__, __FILE__)->throwsNoExceptions();
