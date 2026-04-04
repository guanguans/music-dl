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

use App\Commands\OptimizeImageCommand;
use Spatie\ImageOptimizer\OptimizerChain;

it('can optimize images', function (): void {
    app()->extend(OptimizerChain::class, fn (OptimizerChain $optimizerChain) => $optimizerChain->setOptimizers([]));
    $this->artisan(OptimizeImageCommand::class, ['--dry-run' => true])->assertOk();
    $this->artisan(OptimizeImageCommand::class)->assertOk();
})->group(__DIR__, __FILE__);
