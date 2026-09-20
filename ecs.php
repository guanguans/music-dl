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

use Guanguans\PhpCsFixerCustomFixers\Set\SetList;
use Guanguans\PhpCsFixerCustomFixers\Support\Utils;
use PhpCsFixer\Fixer\ClassNotation\FinalPublicMethodForAbstractClassFixer;
use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use PhpCsFixer\Fixer\FunctionNotation\StaticLambdaFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessDirnameCallFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    // ->withoutParallel()
    ->withPaths(Utils::defaultPaths())
    ->withSkip([
        __DIR__.'/resources/lang/',
        // StaticLambdaFixer::class => [
        //     __DIR__.'/src/ReleaseWorker/RunComposerScriptsReleaseWorker.php',
        //     __DIR__.'/tests/*Test.php',
        //     __DIR__.'/tests/Pest.php',
        // ],
        FinalPublicMethodForAbstractClassFixer::class => [
            __DIR__.'/tests/TestCase.php',
        ],
        NoUselessDirnameCallFixer::class => [
            __DIR__.'/tests/Pest.php',
        ],
    ])
    ->withSets([SetList::GUANGUANS])
    ->withConfiguredRule(HeaderCommentFixer::class, Utils::configurationOfHeaderCommentFixer(
        'guanguans/music-dl',
        '2019',
        __DIR__.'/LICENSE'
    ));
