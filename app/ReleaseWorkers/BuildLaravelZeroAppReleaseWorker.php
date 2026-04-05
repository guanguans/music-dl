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

use Guanguans\MonorepoBuilderWorker\ReleaseWorker\AbstractReleaseWorker;
use PharIo\Version\Version;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\ExecutableFinder;

final class BuildLaravelZeroAppReleaseWorker extends AbstractReleaseWorker
{
    private static ?PhpSubprocessRunner $staticPhpSubprocessRunner = null;
    private static ?string $appName = null;

    public function __construct(private readonly PhpSubprocessRunner $phpSubprocessRunner) {}

    #[\Override]
    public static function check(): void
    {
        \assert(
            \is_string(self::$appName),
            \sprintf('The property "%s::$appName" must be set by calling the method "setAppName".', self::class)
        );
        self::createPhpSubprocessRunner()->run(['-v']);
        self::createPhpSubprocessRunner()->run([self::$appName, '--version', '--ansi', '-v']);
        self::createPhpSubprocessRunner()->run([self::findComposer(), '--version', '--ansi', '-v']);
    }

    /**
     * @api
     *
     * @param non-empty-string $appName
     */
    public static function setAppName(string $appName): void
    {
        self::$appName = $appName;
    }

    #[\Override]
    public function getDescription(Version $version): string
    {
        return \sprintf('Build app "%s" version "%s"', self::$appName, $version->getOriginalString());
    }

    #[\Override]
    public function work(Version $version): void
    {
        register_shutdown_function(function (): void {
            $this->phpSubprocessRunner->run([self::findComposer(), 'install', '--ansi', '-v']);
            $this->phpSubprocessRunner->run([self::$appName, '--version', '--ansi', '-v']);
        });
        $this->phpSubprocessRunner->run([self::findComposer(), 'install', '--no-dev', '--no-scripts', '--ansi', '-v']);
        $this->phpSubprocessRunner->run([self::$appName, 'app:build', self::$appName, '--build-version', $version->getOriginalString(), '--ansi']);
        \assert(
            str_contains(
                $this->phpSubprocessRunner->run([\sprintf('builds/%s', self::$appName), '--version', '--no-ansi']),
                $version->getOriginalString()
            ),
            \sprintf('Build app "%s" failed.', self::$appName)
        );
    }

    public static function createPhpSubprocessRunner(?SymfonyStyle $symfonyStyle = null): PhpSubprocessRunner
    {
        static $phpSubprocessRunner;

        if (!$phpSubprocessRunner instanceof PhpSubprocessRunner || $symfonyStyle instanceof SymfonyStyle) {
            $phpSubprocessRunner = new PhpSubprocessRunner($symfonyStyle ?? self::createSymfonyStyle());
        }

        return $phpSubprocessRunner;
    }

    /**
     * @see \Illuminate\Console\Application::artisanBinary()
     * @see \Illuminate\Console\Application::phpBinary()
     * @see \Illuminate\Support\Composer::findComposer()
     */
    private static function findComposer(): string
    {
        static $composer;

        return $composer ??= new ExecutableFinder()->find('composer', 'composer');
    }
}
