<?php

/** @noinspection PhpUnusedAliasInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use Guanguans\MonorepoBuilderWorker\CreateGithubReleaseReleaseWorker;
use Guanguans\MonorepoBuilderWorker\Support\EnvironmentChecker;
use Guanguans\MonorepoBuilderWorker\UpdateChangelogViaGoReleaseWorker;
use Guanguans\MonorepoBuilderWorker\UpdateChangelogViaNodeReleaseWorker;
use Guanguans\MonorepoBuilderWorker\UpdateChangelogViaPhpReleaseWorker;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;
use Symplify\MonorepoBuilder\Config\MBConfig;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\AddTagToChangelogReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushNextDevReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushTagReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetCurrentMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetNextMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\TagVersionReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateBranchAliasReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateReplaceReleaseWorker;

return static function (MBConfig $mbConfig): void {
    // error_reporting(\E_ALL & ~\E_DEPRECATED & ~\E_USER_DEPRECATED);

    require __DIR__.'/vendor/autoload.php';
    $mbConfig->defaultBranch('master');
    MBConfig::disableDefaultWorkers();

    /**
     * release workers - in order to execute.
     *
     * @see https://github.com/symplify/monorepo-builder#6-release-flow
     */
    $mbConfig->workers($workers = [
        // UpdateReplaceReleaseWorker::class,
        // SetCurrentMutualDependenciesReleaseWorker::class,
        // AddTagToChangelogReleaseWorker::class,
        TagVersionReleaseWorker::class,
        PushTagReleaseWorker::class,
        UpdateChangelogViaGoReleaseWorker::class,
        // UpdateChangelogViaNodeReleaseWorker::class,
        // UpdateChangelogViaPhpReleaseWorker::class,
        CreateGithubReleaseReleaseWorker::class,
        // SetNextMutualDependenciesReleaseWorker::class,
        // UpdateBranchAliasReleaseWorker::class,
        // PushNextDevReleaseWorker::class,
    ]);

    new Process([
        (new PhpExecutableFinder)->find(),
        (new ExecutableFinder)->find($composer = 'composer', $composer),
        'run',
        'checks',
    ])
        ->setEnv(['COMPOSER_MEMORY_LIMIT' => -1])
        ->setTimeout(600)
        ->mustRun(static function (string $type, string $buffer): void {
            $symfonyStyle ??= new SymfonyStyle(new ArgvInput, new ConsoleOutput);
            $symfonyStyle->write($buffer);
        });

    EnvironmentChecker::checks($workers);
};
