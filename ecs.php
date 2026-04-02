<?php

/** @noinspection PhpDeprecationInspection */
/** @noinspection PhpUnhandledExceptionInspection */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use PhpCsFixer\Fixer\Basic\BracesPositionFixer;
use PhpCsFixer\Fixer\Basic\SingleLineEmptyBodyFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Operator\NewWithBracesFixer;
use PhpCsFixer\Fixer\Operator\NewWithParenthesesFixer;
use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
use PhpCsFixer\Fixer\Operator\OperatorLinebreakFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocLineSpanFixer;
use PhpCsFixer\Fixer\StringNotation\ExplicitStringVariableFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBetweenImportGroupsFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\ArrayListItemNewlineFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\ArrayOpenerAndCloserNewlineFixer;
use Symplify\CodingStandard\Fixer\Spacing\StandaloneLinePromotedPropertyFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__.'/src/',
        __DIR__.'/tests/',
        __DIR__.'/composer-bump',
    ])
    ->withRootFiles()
    ->withSkip([
        '*/Fixtures/*',
        __DIR__.'/_ide_helper.php',
        __DIR__.'/tests.php',
        BracesPositionFixer::class,
        SingleLineEmptyBodyFixer::class,
        ClassAttributesSeparationFixer::class,
        ClassDefinitionFixer::class,
        TrailingCommaInMultilineFixer::class,
        YodaStyleFixer::class,
        FunctionDeclarationFixer::class,
        ConcatSpaceFixer::class,
        NewWithBracesFixer::class,
        NewWithParenthesesFixer::class,
        NotOperatorWithSuccessorSpaceFixer::class,
        OperatorLinebreakFixer::class,
        PhpdocLineSpanFixer::class,
        ExplicitStringVariableFixer::class,
        SingleQuoteFixer::class,
        ArrayIndentationFixer::class,
        BlankLineBetweenImportGroupsFixer::class,
        ArrayListItemNewlineFixer::class,
        ArrayOpenerAndCloserNewlineFixer::class,
        StandaloneLinePromotedPropertyFixer::class,
    ])
    ->withCache(__DIR__.'/.build/ecs/')
    ->withEditorConfig()
    // ->withoutParallel()
    ->withParallel()
    ->withPhpCsFixerSets(
        auto: true,
        autoRisky: true,
        autoPHPMigration: true,
        autoPHPMigrationRisky: true,
        autoPHPUnitMigrationRisky: true,
    )
    ->withPreparedSets(
        psr12: true,
        common: true,
    )
    // ->withConfiguredRule()
    ->withRules([
        NoUnusedImportsFixer::class,
    ]);
