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

use App\Commands\TestingCommand;
use Illuminate\Console\OutputStyle;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

it('can get OutputStyle instance', function (): void {
    expect(app(OutputStyle::class))->toBeInstanceOf(OutputStyle::class);
})->group(__DIR__, __FILE__);

it('can get LogManager instance', function (): void {
    expect(Log::getFacadeRoot())->toBeInstanceOf(LogManager::class);
})->group(__DIR__, __FILE__);

it('can run test command', function (): void {
    $this
        ->artisan(TestingCommand::class, [
            '--name' => fake()->name(),
            '--age' => 18,
        ])
        ->assertOk();

    $parameters = [
        // '--xdebug' => false,
        '--xdebug' => true,
        '--configuration' => 'app.name=guanguans',
    ];

    // $this->artisan(TestingCommand::class, $parameters);
    Artisan::call(TestingCommand::class, $parameters);
})->group(__DIR__, __FILE__)->throws(ValidationException::class, '名称 不能为空。 (还有 1 个错误)');
