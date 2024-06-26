<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Exceptions;

final class Handler extends \Illuminate\Foundation\Exceptions\Handler
{
    /**
     * @noinspection PhpMissingParentCallCommonInspection
     * @noinspection PhpUnusedParameterInspection
     * @noinspection PhpInconsistentReturnPointsInspection
     *
     * @psalm-suppress UnusedClosureParam
     */
    #[\Override]
    public function register(): void
    {
        // $this->reportable(static function (\Throwable $throwable) {
        //     if (\Phar::running()) {
        //         return false;
        //     }
        // });
    }
}
