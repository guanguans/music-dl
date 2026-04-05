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

use App\Exceptions\RuntimeException;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\AbstractReleaseWorker;
use Illuminate\Support\Str;
use PharIo\Version\Version;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\PhpExecutableFinder;
use Symplify\MonorepoBuilder\Release\Process\ProcessRunner;

final class BuildLaravelZeroAppReleaseWorker extends AbstractReleaseWorker
{
    private static ?string $appName = null;

    public function __construct(private readonly ProcessRunner $processRunner) {}

    #[\Override]
    public static function check(): void
    {
        \assert(
            \is_string(self::$appName),
            \sprintf('The property "%s::$appName" must be set by calling the method "setAppName".', self::class)
        );
        self::createProcessRunner()->run([self::findPhp(), '-v']);
        self::createProcessRunner()->run([...self::app(), '--version', '--ansi', '-v']);
        self::createProcessRunner()->run([...self::composer(), '--version', '--ansi', '-v']);
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
        $this->processRunner->run([...self::composer(), 'install', '--no-dev', '--no-scripts', '--ansi', '-v']);
        $this->processRunner->run([...self::app(), 'app:build', self::$appName, '--build-version', $version->getOriginalString(), '--ansi']);
        $this->processRunner->run([...self::composer(), 'install', '--ansi', '-v']);
        $this->processRunner->run([...self::app(), '--version', '--ansi', '-v']);

        if (!Str::contains($this->processRunner->run([...self::builtApp(), '--version', '--no-ansi']), $version->getOriginalString())) {
            throw new RuntimeException(\sprintf('Build app "%s" failed.', self::$appName));
        }
    }

    /**
     * @return list<string>
     */
    private static function app(): array
    {
        return [self::findPhp(), self::$appName];
    }

    /**
     * @return list<string>
     */
    private static function builtApp(): array
    {
        return [self::findPhp(), \sprintf('builds/%s', self::$appName)];
    }

    /**
     * @see \Illuminate\Console\Application::artisanBinary()
     *
     * @return list<string>
     */
    private static function composer(): array
    {
        return [self::findPhp(), new ExecutableFinder()->find('composer', 'composer')];
    }

    /**
     * @see \Illuminate\Console\Application::artisanBinary()
     * @see \Illuminate\Console\Application::phpBinary()
     */
    private static function findPhp(): string
    {
        return new PhpExecutableFinder()->find();
    }
}
