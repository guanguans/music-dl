<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Phar;
use Symfony\Component\Console\Output\ConsoleOutput;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     *
     * @psalm-suppress UnusedClosureParam
     */
    public function register()
    {
        $this->reportable(function (\Throwable $e) {
            // Phar::running() and $this->container
            //     ->make(ConsoleOutput::class)
            //     ->writeln(sprintf(config('music-dl.exception_tips'), $e->getMessage()));
        });
    }
}
