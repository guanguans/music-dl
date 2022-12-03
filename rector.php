<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/package-skeleton.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use PHPUnit\Framework\TestCase;
use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodeQuality\Rector\Array_\CallableThisArrayToAnonymousFunctionRector;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\CodeQuality\Rector\Expression\InlineIfToExplicitIfRector;
use Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector;
use Rector\CodeQuality\Rector\LogicalAnd\LogicalToBooleanRector;
use Rector\CodingStyle\Enum\PreferenceSelfThis;
use Rector\CodingStyle\Rector\ClassMethod\UnSpreadOperatorRector;
use Rector\CodingStyle\Rector\Closure\StaticClosureRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\Encapsed\WrapEncapsedVariableInCurlyBracesRector;
use Rector\CodingStyle\Rector\FuncCall\ConsistentPregDelimiterRector;
use Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector;
use Rector\Config\RectorConfig;
use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\DeadCode\Rector\Assign\RemoveUnusedVariableAssignRector;
use Rector\DeadCode\Rector\MethodCall\RemoveEmptyMethodCallRector;
use Rector\EarlyReturn\Rector\If_\ChangeAndIfToEarlyReturnRector;
use Rector\EarlyReturn\Rector\Return_\ReturnBinaryOrToEarlyReturnRector;
use Rector\Php56\Rector\FunctionLike\AddDefaultValueForUndefinedVariableRector;
use Rector\PHPUnit\Rector\Class_\AddSeeTestAnnotationRector;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\PSR4\Rector\FileWithoutNamespace\NormalizeNamespaceByPSR4ComposerAutoloadRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->bootstrapFiles([
        // __DIR__.'/vendor/autoload.php',
    ]);

    $rectorConfig->autoloadPaths([
        // __DIR__.'/vendor/autoload.php',
    ]);

    $rectorConfig->paths([
        __DIR__.'/src',
        __DIR__.'/tests',
    ]);

    $rectorConfig->skip([
        // rules
        CallableThisArrayToAnonymousFunctionRector::class,
        InlineIfToExplicitIfRector::class,
        LogicalToBooleanRector::class,
        SimplifyBoolIdenticalTrueRector::class,
        RemoveEmptyMethodCallRector::class,
        AddSeeTestAnnotationRector::class,
        NormalizeNamespaceByPSR4ComposerAutoloadRector::class,
        ChangeAndIfToEarlyReturnRector::class,
        ReturnBinaryOrToEarlyReturnRector::class,
        EncapsedStringsToSprintfRector::class,
        WrapEncapsedVariableInCurlyBracesRector::class,

        // optional rules
        // AddDefaultValueForUndefinedVariableRector::class,
        // RemoveUnusedVariableAssignRector::class,
        // UnSpreadOperatorRector::class,
        // ConsistentPregDelimiterRector::class,
        // StaticClosureRector::class,

        // paths
        '**/Fixture*',
        '**/Fixture/*',
        '**/Source*',
        '**/Source/*',
        '**/Expected/*',
        '**/Expected*',
        __DIR__.'/src/foundation/tests/AppTest.php',
    ]);

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_72,
        SetList::ACTION_INJECTION_TO_CONSTRUCTOR_INJECTION,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        // SetList::GMAGICK_TO_IMAGICK,
        // SetList::MONOLOG_20,
        // SetList::MYSQL_TO_MYSQLI,
        SetList::NAMING,
        // SetList::PRIVATIZATION,
        SetList::PSR_4,
        SetList::TYPE_DECLARATION,
        SetList::TYPE_DECLARATION_STRICT,
        SetList::EARLY_RETURN,

        PHPUnitLevelSetList::UP_TO_PHPUNIT_70,
        // PHPUnitSetList::PHPUNIT80_DMS,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
        PHPUnitSetList::PHPUNIT_EXCEPTION,
        PHPUnitSetList::REMOVE_MOCKS,
        PHPUnitSetList::PHPUNIT_SPECIFIC_METHOD,
        PHPUnitSetList::PHPUNIT_YIELD_DATA_PROVIDER,
    ]);

    $rectorConfig->disableParallel();
    $rectorConfig->importNames(true, false);
    $rectorConfig->nestedChainMethodCallLimit(3);
    $rectorConfig->phpstanConfig(__DIR__.'/phpstan.neon');
    // $rectorConfig->cacheClass(FileCacheStorage::class);
    // $rectorConfig->cacheDirectory(__DIR__.'/build/rector');
    // $rectorConfig->fileExtensions(['php']);
    // $rectorConfig->parameters()->set(Option::APPLY_AUTO_IMPORT_NAMES_ON_CHANGED_FILES_ONLY, true);
    // $rectorConfig->phpVersion(PhpVersion::PHP_80);
    // $rectorConfig->parallel();
    // $rectorConfig->indent(' ', 4);

    $rectorConfig->rules([
        InlineConstructorDefaultToPropertyRector::class,
    ]);

    $rectorConfig->ruleWithConfiguration(
        PreferThisOrSelfMethodCallRector::class,
        [
            TestCase::class => PreferenceSelfThis::PREFER_THIS,
        ]
    );
};
