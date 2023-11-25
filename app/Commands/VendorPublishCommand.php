<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Commands;

final class VendorPublishCommand extends \Illuminate\Foundation\Console\VendorPublishCommand
{
    /**
     * @psalm-suppress UndefinedInterfaceMethod
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function isEnabled(): bool
    {
        return ! $this->laravel->isProduction();
    }
}
