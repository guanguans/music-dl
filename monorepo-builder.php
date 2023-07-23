<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use Guanguans\MonorepoBuilderWorker\CreateGithubReleaseWorker;
use Guanguans\MonorepoBuilderWorker\GoUpdateChangelogReleaseWorker;
use Guanguans\MonorepoBuilderWorker\NodeUpdateChangelogReleaseWorker;
use Guanguans\MonorepoBuilderWorker\PhpUpdateChangelogReleaseWorker;
use Guanguans\MonorepoBuilderWorker\Support\EnvironmentChecker;
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
    require __DIR__.'/vendor/autoload.php';
    $mbConfig->defaultBranch('master');

    /**
     * release workers - in order to execute
     *
     * @see https://github.com/symplify/monorepo-builder#6-release-flow
     */
    $mbConfig->workers($workers = [
        // UpdateReplaceReleaseWorker::class,
        // SetCurrentMutualDependenciesReleaseWorker::class,
        // AddTagToChangelogReleaseWorker::class,
        // NodeUpdateChangelogReleaseWorker::class,
        TagVersionReleaseWorker::class,
        PushTagReleaseWorker::class,
        GoUpdateChangelogReleaseWorker::class,
        // PhpUpdateChangelogReleaseWorker::class,
        CreateGithubReleaseWorker::class,
        // SetNextMutualDependenciesReleaseWorker::class,
        // UpdateBranchAliasReleaseWorker::class,
        // PushNextDevReleaseWorker::class,
    ]);

    EnvironmentChecker::checks($workers);
};
