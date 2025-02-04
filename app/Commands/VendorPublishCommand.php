<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Commands;

final class VendorPublishCommand extends \Illuminate\Foundation\Console\VendorPublishCommand
{
    /**
     * @noinspection PhpMissingParentCallCommonInspection
     *
     * @psalm-suppress UndefinedInterfaceMethod
     */
    #[\Override]
    public function isEnabled(): bool
    {
        return !$this->laravel->isProduction();
    }
}
