<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Exceptions;

final class Handler extends \Illuminate\Foundation\Exceptions\Handler
{
    /**
     * @psalm-suppress UnusedClosureParam
     *
     * @noinspection PhpMissingParentCallCommonInspection
     * @noinspection PhpUnusedParameterInspection
     * @noinspection PhpInconsistentReturnPointsInspection
     */
    #[\Override]
    #[\PHPUnit\Framework\Attributes\CodeCoverageIgnore]
    public function register(): void
    {
        $this->reportable(static function (\Throwable $throwable) {
            if (\Phar::running()) {
                return false;
            }
        });
    }
}
