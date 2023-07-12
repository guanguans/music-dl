<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use App\Commands\ThanksCommand;

it('can thanks for using this tool', function (): void {
    $this->getFunctionMock(class_namespace(ThanksCommand::class), 'exec')
        ->expects($this->once())
        ->willReturn('');

    $this->artisan(ThanksCommand::class)
        ->expectsQuestion('Can you quickly <options=bold>star our GitHub repository</>? 🙏🏻', 'yes')
        ->assertSuccessful();
})->group(__DIR__, __FILE__);
