<?php

/** @noinspection PhpInternalEntityUsedInspection */
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

use Ergebnis\Rector\Rules\Expressions\Arrays\SortAssociativeArrayByKeyRector;
use Guanguans\PhpCsFixerCustomFixers\Support\Utils;
use Guanguans\RectorRules\Rector\File\AddNoinspectionDocblockToFileFirstStmtRector;
use Guanguans\RectorRules\Rector\Name\RenameToConventionalCaseNameRector;
use Guanguans\RectorRules\Set\SetList;
use Pest\Rector\Rules\ChainExpectCallsRector;
use Pest\Rector\Set\PestSetList;
use PhpParser\NodeVisitor\ParentConnectingVisitor;
use Rector\CodeQuality\Rector\Concat\DirnameDirConcatStringToDirectStringPathRector;
use Rector\CodeQuality\Rector\LogicalAnd\LogicalToBooleanRector;
use Rector\CodingStyle\Rector\ArrowFunction\ArrowFunctionDelegatingCallToFirstClassCallableRector;
use Rector\CodingStyle\Rector\Assign\SplitDoubleAssignRector;
use Rector\CodingStyle\Rector\ClassLike\NewlineBetweenClassLikeStmtsRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;
use Rector\Transform\Rector\String_\StringToClassConstantRector;
use Rector\ValueObject\PhpVersion;
use RectorLaravel\Rector\ArrayDimFetch\ArrayToArrGetRector;
use RectorLaravel\Rector\Empty_\EmptyToBlankAndFilledFuncRector;
use RectorLaravel\Rector\FuncCall\HelperFuncCallToFacadeClassRector;
use RectorLaravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector;
use RectorLaravel\Rector\If_\ThrowIfRector;
use RectorLaravel\Rector\MethodCall\ContainerBindConcreteWithClosureOnlyRector;
use RectorLaravel\Rector\MethodCall\UseComponentPropertyWithinCommandsRector;
use RectorLaravel\Rector\StaticCall\DispatchToHelperFunctionsRector;

error_reporting(\E_ALL & ~\E_DEPRECATED & ~\E_USER_DEPRECATED);

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app/',
        __DIR__.'/bootstrap/',
        // __DIR__.'/config/',
        // __DIR__.'/database/',
        // __DIR__.'/public/',
        // __DIR__.'/resources/',
        // __DIR__.'/routes/',
        __DIR__.'/tests/',
        ...Utils::defaultRootFiles(),
    ])
    ->withRootFiles()
    ->withSkip(['*/Fixtures/*'])
    ->withSkip([
        ChainExpectCallsRector::class,

        LogicalToBooleanRector::class,
        NewlineBetweenClassLikeStmtsRector::class,
        PreferPHPUnitThisCallRector::class,
        SplitDoubleAssignRector::class,
    ])
    ->withSkip([
        ContainerBindConcreteWithClosureOnlyRector::class,

        ArrayToArrGetRector::class,
        DispatchToHelperFunctionsRector::class,
        EmptyToBlankAndFilledFuncRector::class,
        HelperFuncCallToFacadeClassRector::class,
        ThrowIfRector::class,
    ])
    ->withSkip([
        ArrowFunctionDelegatingCallToFirstClassCallableRector::class => [
            __DIR__.'/app/Support/ServerDumper.php',
        ],
        DirnameDirConcatStringToDirectStringPathRector::class => [
            __DIR__.'/tests/Pest.php',
        ],
        RemoveDumpDataDeadCodeRector::class => [
            __DIR__.'/tests/Unit/Support/ServerDumperTest.php',
        ],
        SortAssociativeArrayByKeyRector::class => [
            __DIR__.'/app/',
            __DIR__.'/tests/',
        ],
        StringToClassConstantRector::class => [
            __DIR__.'/composer-bump',
        ],
        UseComponentPropertyWithinCommandsRector::class => [
            __DIR__.'/app/Commands/InspireCommand.php',
        ],
    ])
    ->withCache(__DIR__.'/.build/rector/')
    // ->withoutParallel()
    ->withParallel()
    ->withImportNames(importDocBlockNames: false, importShortClasses: false, removeUnusedImports: false)
    // ->withImportNames(true, false, false, false)
    ->reportUnusedSkips()
    ->withFluentCallNewLine()
    ->withTreatClassesAsFinal()
    ->withTypeGuardedClasses([])
    ->withAttributesSets(phpunit: true, all: true)
    ->withComposerBased(phpunit: true, laravel: true)
    ->withPhpVersion(PhpVersion::PHP_85)
    // ->withDowngradeSets(php85: true)
    ->withPhpSets(php85: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        typeDeclarationDocblocks: true,
        privatization: true,
        // naming: true,
        // namedArgs: true,
        carbon: true,
        rectorPreset: true,
        phpunitCodeQuality: true,
        phpunitNarrowAsserts: true,
        phpunitMockToStub: true,
    )
    ->withSets([
        SetList::ALL,
        PestSetList::CODING_STYLE,
    ])
    ->withRules([])
    ->withConfiguredRule(AddNoinspectionDocblockToFileFirstStmtRector::class, [
        '*/tests/*' => [
            'AnonymousFunctionStaticInspection',
            'NullPointerExceptionInspection',
            'PhpPossiblePolymorphicInvocationInspection',
            'PhpUndefinedClassInspection',
            'PhpUnhandledExceptionInspection',
            'PhpVoidFunctionResultUsedInspection',
            'StaticClosureCanBeUsedInspection',
        ],
    ])
    ->registerDecoratingNodeVisitor(ParentConnectingVisitor::class)
    ->withConfiguredRule(RenameToConventionalCaseNameRector::class, ['afterEach', 'beforeEach', 'MIT', 'PDO'])
    ->withConfiguredRule(
        RenameFunctionRector::class,
        collect(['classes', 'make'])
            ->mapWithKeys(static fn (string $func): array => [$func => "App\\Support\\$func"])
            ->all()
    );
