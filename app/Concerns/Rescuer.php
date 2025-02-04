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

namespace App\Concerns;

use Illuminate\Contracts\Debug\ExceptionHandler;

/**
 * @mixin \Illuminate\Console\Command
 */
trait Rescuer
{
    /**
     * @template TValue
     *
     * @noinspection RedundantDocCommentTagInspection
     *
     * @psalm-suppress InvalidReturnType
     * @psalm-suppress InvalidReturnStatement
     *
     * @param callable(): TValue $callback
     * @param bool|callable(\Throwable): bool $report
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     * @return \Throwable|TValue
     */
    public function rescue(callable $callback, bool|callable $report = false): mixed
    {
        return rescue(
            $callback,
            function (\Throwable $throwable): \Throwable {
                $this->laravel->make(ExceptionHandler::class)->renderForConsole($this->output, $throwable);

                return $throwable;
            },
            $report
        );
    }
}
