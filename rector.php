<?php

/** @noinspection PhpInArrayCanBeReplacedWithComparisonInspection */
/** @noinspection InArrayMissUseInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use PHPUnit\Framework\Attributes\CodeCoverageIgnore;
use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodeQuality\Rector\Array_\CallableThisArrayToAnonymousFunctionRector;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\CodeQuality\Rector\Expression\InlineIfToExplicitIfRector;
use Rector\CodeQuality\Rector\FuncCall\SingleInArrayToCompareRector;
use Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\CodeQuality\Rector\LogicalAnd\LogicalToBooleanRector;
use Rector\CodingStyle\Rector\ArrowFunction\StaticArrowFunctionRector;
use Rector\CodingStyle\Rector\Closure\StaticClosureRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\Encapsed\WrapEncapsedVariableInCurlyBracesRector;
use Rector\Config\RectorConfig;
use Rector\Configuration\Option;
use Rector\DeadCode\Rector\Assign\RemoveUnusedVariableAssignRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveEmptyClassMethodRector;
use Rector\EarlyReturn\Rector\If_\ChangeAndIfToEarlyReturnRector;
use Rector\EarlyReturn\Rector\Return_\ReturnBinaryOrToEarlyReturnRector;
use Rector\EarlyReturn\Rector\StmtsAwareInterface\ReturnEarlyIfVariableRector;
use Rector\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector;
use Rector\Naming\Rector\Class_\RenamePropertyToMatchTypeRector;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;
use Rector\Naming\Rector\Foreach_\RenameForeachValueVariableToMatchExprVariableRector;
use Rector\Php71\Rector\FuncCall\RemoveExtraParametersRector;
use Rector\Php80\Rector\Catch_\RemoveUnusedVariableInCatchRector;
use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\Php80\ValueObject\AnnotationToAttribute;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector;
use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;
use Rector\Set\ValueObject\DowngradeLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\ValueObject\PhpVersion;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->importNames(false, false);
    $rectorConfig->importShortClasses(false);
    // $rectorConfig->disableParallel();
    $rectorConfig->parallel(300);
    $rectorConfig->phpstanConfig(__DIR__.'/phpstan.neon');
    $rectorConfig->phpVersion(PhpVersion::PHP_81);
    // $rectorConfig->cacheClass(FileCacheStorage::class);
    // $rectorConfig->cacheDirectory(__DIR__.'/build/rector');
    // $rectorConfig->containerCacheDirectory(__DIR__.'/build/rector');
    // $rectorConfig->disableParallel();
    // $rectorConfig->fileExtensions(['php']);
    // $rectorConfig->indent(' ', 4);
    // $rectorConfig->memoryLimit('2G');
    // $rectorConfig->nestedChainMethodCallLimit(3);
    // $rectorConfig->noDiffs();
    // $rectorConfig->parameters()->set(Option::APPLY_AUTO_IMPORT_NAMES_ON_CHANGED_FILES_ONLY, true);
    // $rectorConfig->removeUnusedImports();

    $rectorConfig->bootstrapFiles([
        // __DIR__.'/vendor/autoload.php',
    ]);

    $rectorConfig->autoloadPaths([
        // __DIR__.'/vendor/autoload.php',
    ]);

    $rectorConfig->paths([
        __DIR__.'/app',
        __DIR__.'/tests',
        __DIR__.'/.*.php',
        __DIR__.'/*.php',
        __DIR__.'/composer-updater',
    ]);

    $rectorConfig->skip([
        // rules
        // CallableThisArrayToAnonymousFunctionRector::class,
        // ChangeAndIfToEarlyReturnRector::class,
        // ExplicitBoolCompareRector::class,
        // RemoveUnusedVariableAssignRector::class,
        // ReturnBinaryOrToEarlyReturnRector::class,
        // SimplifyBoolIdenticalTrueRector::class,
        // StaticClosureRector::class,

        EncapsedStringsToSprintfRector::class,
        // InlineIfToExplicitIfRector::class,
        LogicalToBooleanRector::class,
        WrapEncapsedVariableInCurlyBracesRector::class,

        DisallowedEmptyRuleFixerRector::class => [
            // __DIR__.'/src/Support/QueryAnalyzer.php',
        ],
        RemoveExtraParametersRector::class => [
            // __DIR__.'/src/Macros/QueryBuilderMacro.php',
        ],
        RemoveUnusedVariableInCatchRector::class => [
            // __DIR__.'/src/JavascriptRenderer.php',
            '*',
        ],
        ExplicitBoolCompareRector::class => [
            // __DIR__.'/src/JavascriptRenderer.php',
            '*',
        ],
        FinalizeClassesWithoutChildrenRector::class => [
            __DIR__.'/app/Music/SequenceMusic.php',
            __DIR__.'/app/MusicManager.php',
            __DIR__.'/app/Support/Meting.php',
        ],
        RemoveEmptyClassMethodRector::class => [
            __DIR__.'/app/Providers/AppServiceProvider.php',
        ],
        RenameForeachValueVariableToMatchExprVariableRector::class => [
            // __DIR__.'/src/OutputManager.php',
        ],
        RenameVariableToMatchMethodCallReturnTypeRector::class => [
            __DIR__.'/tests/',
        ],
        RenameParamToMatchTypeRector::class => [
            // __DIR__.'/src/Support/helpers.php',
            '*',
        ],
        RenamePropertyToMatchTypeRector::class => [
            // __DIR__.'/src/Support/helpers.php',
            '*',
        ],
        StaticClosureRector::class => [
            __FILE__,
            __DIR__.'/tests',
        ],
        StaticArrowFunctionRector::class => [
            __DIR__.'/tests',
        ],

        SingleInArrayToCompareRector::class => [
            __FILE__,
        ],
        // ReturnEarlyIfVariableRector::class => [
        //     __DIR__.'/src/Support/EscapeArg.php',
        // ],

        // paths
        __DIR__.'/tests/AspectMock',
        '**/Fixture*',
        '**/Fixture/*',
        '**/Fixtures*',
        '**/Fixtures/*',
        '**/Stub*',
        '**/Stub/*',
        '**/Stubs*',
        '**/Stubs/*',
        '**/Source*',
        '**/Source/*',
        '**/Expected/*',
        '**/Expected*',
        '**/__snapshots__/*',
        '**/__snapshots__*',
    ]);

    $rectorConfig->sets([
        DowngradeLevelSetList::DOWN_TO_PHP_81,
        LevelSetList::UP_TO_PHP_81,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        // SetList::STRICT_BOOLEANS,
        // SetList::GMAGICK_TO_IMAGICK,
        // SetList::MYSQL_TO_MYSQLI,
        SetList::NAMING,
        SetList::PRIVATIZATION,
        SetList::TYPE_DECLARATION,
        SetList::EARLY_RETURN,
        SetList::INSTANCEOF,

        PHPUnitSetList::PHPUNIT_100,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
        PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,
    ]);

    $rectorConfig->rules([
        InlineConstructorDefaultToPropertyRector::class,
    ]);

    $rectorConfig->ruleWithConfiguration(RenameFunctionRector::class, [
        'test' => 'it',
    ]);

    (function ($rectorConfig): void {
        $rectorConfig->ruleConfigurations[AnnotationToAttributeRector::class] = array_filter(
            $rectorConfig->ruleConfigurations[AnnotationToAttributeRector::class],
            static fn (AnnotationToAttribute $annotationToAttribute): bool => !\in_array(
                $annotationToAttribute->getAttributeClass(),
                [
                    CodeCoverageIgnore::class,
                ],
                true
            )
        );
    })->call($rectorConfig, $rectorConfig);
};
