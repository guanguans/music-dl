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

use Guanguans\MonorepoBuilderWorker\ReleaseWorker\BuildLaravelZeroAppReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\CheckEnvironmentReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\CreateGithubReleaseReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\RunComposerScriptsReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\UpdateChangelogViaGoReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\UpdateChangelogViaNodeReleaseWorker;
use Guanguans\MonorepoBuilderWorker\ReleaseWorker\UpdateChangelogViaPhpReleaseWorker;
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
    $mbConfig->defaultBranch('master');
    // MBConfig::disableDefaultWorkers();

    // $services = $mbConfig->services();
    // $services->set(BranchAwareTagResolver::class);
    // $services->alias(TagResolverInterface::class, BranchAwareTagResolver::class);

    /**
     * release workers - in order to execute.
     *
     * @see https://github.com/symplify/monorepo-builder#6-release-flow
     * @see vendor/guanguans/monorepo-builder-worker/monorepo-builder.php
     */
    $mbConfig->workers([
        CheckEnvironmentReleaseWorker::class,
        RunComposerScriptsReleaseWorker::class,
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

    CheckEnvironmentReleaseWorker::configure($mbConfig);
    RunComposerScriptsReleaseWorker::configure($mbConfig, 'checks:required');
    BuildLaravelZeroAppReleaseWorker::configure($mbConfig, 'music-dl');
    UpdateChangelogViaPhpReleaseWorker::configure($mbConfig);
    CreateGithubReleaseReleaseWorker::configure($mbConfig, [__DIR__.'/builds/music-dl' => __DIR__.'/builds/music-dl.phar']);
};
