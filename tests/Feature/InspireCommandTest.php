<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Feature;

use App\Commands\InspireCommand;

it('can inspire Artisan', function (): void {
    $this->artisan(InspireCommand::class, ['name' => 'Artisan'])->assertSuccessful();
})->group(__DIR__, __FILE__);
