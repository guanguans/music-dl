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

namespace App\ReleaseWorkers;

use App\Exceptions\RuntimeException;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker;
use PharIo\Version\Version;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\PhpExecutableFinder;
use Symplify\MonorepoBuilder\Release\Process\ProcessRunner;

final class BuildAppReleaseWorker extends ReleaseWorker
{
    public function __construct(private readonly ProcessRunner $processRunner) {}

    #[\Override]
    public static function check(): void
    {
        self::createProcessRunner()->run([
            self::findPhp(),
            '-v',
        ]);

        self::createProcessRunner()->run([
            self::findPhp(),
            'music-dl',
            '--version',
            '--ansi',
            '-v',
        ]);

        self::createProcessRunner()->run([
            self::findPhp(),
            self::findComposer(),
            '--version',
        ]);
    }

    #[\Override]
    public function work(Version $version): void
    {
        $this->processRunner->run([
            self::findPhp(),
            self::findComposer(),
            'install',
            '--no-dev',
            '--no-scripts',
            '--ansi',
            '-v',
        ]);

        $this->processRunner->run([
            self::findPhp(),
            'music-dl',
            'app:build',
            'music-dl',
            '--build-version',
            $version->getOriginalString(),
            '--ansi',
        ]);

        $this->processRunner->run([
            self::findPhp(),
            self::findComposer(),
            'install',
            '--ansi',
            '-v',
        ]);

        if (
            !str($this->processRunner->run([self::findPhp(), 'builds/music-dl', '--version', '--ansi', '-v']))
                ->contains($version->getOriginalString())
        ) {
            throw new RuntimeException('Build app "%s" failed.');
        }

        $this->processRunner->run([
            self::findPhp(),
            'music-dl',
            '--version',
            '--ansi',
            '-v',
        ]);
    }

    #[\Override]
    public function getDescription(Version $version): string
    {
        return \sprintf('Build app "%s"', $version->getOriginalString());
    }

    private static function findComposer(?string $default = 'composer', array $extraDirs = []): string
    {
        return new ExecutableFinder()->find('composer', $default, $extraDirs);
    }

    private static function findPhp(bool $includeArgs = true): string
    {
        return new PhpExecutableFinder()->find($includeArgs);
    }
}
