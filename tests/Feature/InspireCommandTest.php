<?php

/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection StaticClosureCanBeUsedInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace Tests\Feature;

use App\Commands\InspireCommand;

it('can inspire Artisan', function (): void {
    $this->artisan(InspireCommand::class, ['name' => 'Artisan'])->assertOk();
})->group(__DIR__, __FILE__);
