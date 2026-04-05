<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\ReleaseWorkers;

use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\PhpSubprocess;

/**
 * @see \Symplify\MonorepoBuilder\Release\Process\ProcessRunner
 */
final readonly class PhpSubprocessRunner
{
    /** Reasonable timeout to report hang off: 10 minutes. */
    private const int TIMEOUT = 600;

    public function __construct(private SymfonyStyle $symfonyStyle) {}

    /**
     * @param list<string> $commandLine
     */
    public function run(array $commandLine, ?string $cwd = null): string
    {
        $phpSubprocess = $this->createPhpSubprocess($commandLine, $cwd);

        if ($this->symfonyStyle->isVerbose()) {
            $this->symfonyStyle->note("Running phpSubprocess: {$phpSubprocess->getCommandLine()}");
        }

        $phpSubprocess->run();

        $this->reportResult($phpSubprocess);

        return $phpSubprocess->getOutput();
    }

    /**
     * @param list<string> $commandLine
     */
    private function createPhpSubprocess(array $commandLine, ?string $cwd): PhpSubprocess
    {
        return new PhpSubprocess($commandLine, $cwd, null, self::TIMEOUT);
    }

    private function reportResult(PhpSubprocess $phpSubprocess): void
    {
        if ($phpSubprocess->isSuccessful()) {
            return;
        }

        throw new ProcessFailedException($phpSubprocess);
    }
}
