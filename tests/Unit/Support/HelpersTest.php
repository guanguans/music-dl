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

use App\Music;
use function App\Support\classes;
use function App\Support\make;

it('can get classes', function (): void {
    expect(
        classes(fn (string $class): bool => str($class)->startsWith('Rectors'))
    )->toBeCollection();
})->group(__DIR__, __FILE__);

it('will throw `InvalidArgumentException` when abstract is empty array', function (): void {
    make([]);
})->group(__DIR__, __FILE__)->throws(InvalidArgumentException::class);

it('can make music', function (array|string $abstract): void {
    expect(make($abstract))->toBeInstanceOf(Music::class);
})->group(__DIR__, __FILE__)->with([
    ['abstract' => Music::class],
    ['abstract' => ['__abstract' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['__class' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['__name' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['_abstract' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['_class' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['_name' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['abstract' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['class' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
    ['abstract' => ['name' => Music::class, 'driver' => null, 'minCallMicroseconds' => 1000]],
]);
