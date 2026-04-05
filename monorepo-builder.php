<?php

/** @noinspection PhpUnusedAliasInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use App\ReleaseWorkers\BuildLaravelZeroAppReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\CreateGithubReleaseReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\UpdateChangelogViaGoReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\UpdateChangelogViaNodeReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\UpdateChangelogViaPhpReleaseWorker;
use Guanguans\MonorepoBuilderWorker\Support\EnvironmentChecker;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\PhpSubprocess;
use Symplify\MonorepoBuilder\Config\MBConfig;
use Symplify\MonorepoBuilder\Contract\Git\TagResolverInterface;
use Symplify\MonorepoBuilder\Git\BranchAwareTagResolver;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\AddTagToChangelogReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushNextDevReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushTagReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetCurrentMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetNextMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\TagVersionReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateBranchAliasReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateReplaceReleaseWorker;

return static function (MBConfig $mbConfig): void {
    $mbConfig->defaultBranch('master');
    MBConfig::disableDefaultWorkers();

    // $services = $mbConfig->services();
    // $services->set(BranchAwareTagResolver::class);
    // $services->alias(TagResolverInterface::class, BranchAwareTagResolver::class);

    /**
     * release workers - in order to execute.
     *
     * @see https://github.com/symplify/monorepo-builder#6-release-flow
     */
    $mbConfig->workers($workers = [
        // UpdateReplaceReleaseWorker::class,
        // SetCurrentMutualDependenciesReleaseWorker::class,
        // AddTagToChangelogReleaseWorker::class,
        BuildLaravelZeroAppReleaseWorker::class,
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

    if (!(new ArgvInput)->hasParameterOption('--dry-run', true)) {
        new PhpSubprocess([(new ExecutableFinder)->find('composer'), 'run', 'checks:required', '--ansi'])
            ->setEnv(['COMPOSER_MEMORY_LIMIT' => -1])
            ->setTimeout(600)
            ->mustRun(static function (string $_, string $buffer): void {
                $symfonyStyle ??= new SymfonyStyle(new ArgvInput, new ConsoleOutput);
                $symfonyStyle->write($buffer);
            });
    }

    EnvironmentChecker::checks($workers);
};
