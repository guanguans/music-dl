<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

// use App\Support\Rectors\RenameToPsrNameRector;
use App\Music;
use Rector\CodeQuality\Rector\FuncCall\CompactToVariablesRector;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\CodeQuality\Rector\LogicalAnd\LogicalToBooleanRector;
use Rector\CodingStyle\Rector\ArrowFunction\StaticArrowFunctionRector;
use Rector\CodingStyle\Rector\Closure\StaticClosureRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\Encapsed\WrapEncapsedVariableInCurlyBracesRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\Config\RectorConfig;
use Rector\Naming\Rector\Class_\RenamePropertyToMatchTypeRector;
use Rector\Naming\Rector\Foreach_\RenameForeachValueVariableToMatchMethodCallReturnTypeRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\Rector\String_\RenameStringRector;
use Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector;
use Rector\Transform\ValueObject\MethodCallToStaticCall;
use RectorLaravel\Rector\MethodCall\UseComponentPropertyWithinCommandsRector;
use RectorLaravel\Set\LaravelSetList;

// (function ($rectorConfig): void {
//     $rectorConfig->ruleConfigurations[AnnotationToAttributeRector::class] = array_filter(
//         $rectorConfig->ruleConfigurations[AnnotationToAttributeRector::class],
//         static fn (AnnotationToAttribute $annotationToAttribute): bool => !\in_array(
//             $annotationToAttribute->getAttributeClass(),
//             [
//                 CodeCoverageIgnore::class,
//             ],
//             true
//         )
//     );
// })->call($rectorConfig, $rectorConfig);

/** @noinspection PhpUnhandledExceptionInspection */
return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/*.php',
        __DIR__.'/.*.php',
        __DIR__.'/app',
        __DIR__.'/composer-updater',
        __DIR__.'/config',
        __DIR__.'/tests',
    ])
    ->withPHPStanConfigs([
        __DIR__.'/phpstan.neon',
    ])
    ->withParallel()
    // ->withoutParallel()
    ->withImportNames(importNames: false, importDocBlockNames: false)
    // ->withDeadCodeLevel(42)
    // ->withTypeCoverageLevel(23)
    // ->withFluentCallNewLine()
    ->withDowngradeSets(php83: true)
    ->withPhpSets(php83: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        naming: true,
        instanceOf: true,
        earlyReturn: true,
    )
    ->withAttributesSets(
        phpunit: true
    )
    ->withSets([
        PHPUnitSetList::PHPUNIT_100,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
        PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,

        LaravelSetList::LARAVEL_110,
        // LaravelSetList::LARAVEL_STATIC_TO_INJECTION,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
        LaravelSetList::LARAVEL_LEGACY_FACTORIES_TO_CLASSES,
        LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES,
        LaravelSetList::LARAVEL_ELOQUENT_MAGIC_METHOD_TO_QUERY_BUILDER,
    ])
    ->withRules([
        StaticArrowFunctionRector::class,
        StaticClosureRector::class,
    ])
    ->withRules([
        // // RectorLaravel\Rector\Assign\CallOnAppArrayAccessToStandaloneAssignRector::class,
        // // RectorLaravel\Rector\Cast\DatabaseExpressionCastsToMethodCallRector::class,
        RectorLaravel\Rector\ClassMethod\AddParentBootToModelClassMethodRector::class,
        RectorLaravel\Rector\ClassMethod\AddParentRegisterToEventServiceProviderRector::class,
        RectorLaravel\Rector\ClassMethod\MigrateToSimplifiedAttributeRector::class,
        RectorLaravel\Rector\Class_\AddExtendsAnnotationToModelFactoriesRector::class,
        RectorLaravel\Rector\Class_\AddMockConsoleOutputFalseToConsoleTestsRector::class,
        RectorLaravel\Rector\Class_\AnonymousMigrationsRector::class,
        RectorLaravel\Rector\Class_\ModelCastsPropertyToCastsMethodRector::class,
        RectorLaravel\Rector\Class_\PropertyDeferToDeferrableProviderToRector::class,
        RectorLaravel\Rector\Class_\RemoveModelPropertyFromFactoriesRector::class,
        // // RectorLaravel\Rector\Class_\ReplaceExpectsMethodsInTestsRector::class,
        // // RectorLaravel\Rector\Class_\UnifyModelDatesWithCastsRector::class,
        // RectorLaravel\Rector\Empty_\EmptyToBlankAndFilledFuncRector::class,
        RectorLaravel\Rector\Expr\AppEnvironmentComparisonToParameterRector::class,
        RectorLaravel\Rector\Expr\SubStrToStartsWithOrEndsWithStaticMethodCallRector\SubStrToStartsWithOrEndsWithStaticMethodCallRector::class,
        // // RectorLaravel\Rector\FuncCall\DispatchNonShouldQueueToDispatchSyncRector::class,
        // // RectorLaravel\Rector\FuncCall\FactoryFuncCallToStaticCallRector::class,
        // RectorLaravel\Rector\FuncCall\HelperFuncCallToFacadeClassRector::class,
        RectorLaravel\Rector\FuncCall\NotFilledBlankFuncCallToBlankFilledFuncCallRector::class,
        RectorLaravel\Rector\FuncCall\NowFuncWithStartOfDayMethodCallToTodayFuncRector::class,
        RectorLaravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector::class,
        RectorLaravel\Rector\FuncCall\RemoveRedundantValueCallsRector::class,
        RectorLaravel\Rector\FuncCall\RemoveRedundantWithCallsRector::class,
        RectorLaravel\Rector\FuncCall\SleepFuncToSleepStaticCallRector::class,
        // RectorLaravel\Rector\FuncCall\ThrowIfAndThrowUnlessExceptionsToUseClassStringRector::class,
        RectorLaravel\Rector\If_\AbortIfRector::class,
        RectorLaravel\Rector\If_\ReportIfRector::class,
        // RectorLaravel\Rector\If_\ThrowIfRector::class,
        RectorLaravel\Rector\MethodCall\AssertStatusToAssertMethodRector::class,
        RectorLaravel\Rector\MethodCall\ChangeQueryWhereDateValueWithCarbonRector::class,
        // // RectorLaravel\Rector\MethodCall\DatabaseExpressionToStringToMethodCallRector::class,
        RectorLaravel\Rector\MethodCall\EloquentWhereRelationTypeHintingParameterRector::class,
        RectorLaravel\Rector\MethodCall\EloquentWhereTypeHintClosureParameterRector::class,
        // // RectorLaravel\Rector\MethodCall\FactoryApplyingStatesRector::class,
        RectorLaravel\Rector\MethodCall\JsonCallToExplicitJsonCallRector::class,
        // RectorLaravel\Rector\MethodCall\LumenRoutesStringActionToUsesArrayRector::class,
        // RectorLaravel\Rector\MethodCall\LumenRoutesStringMiddlewareToArrayRector::class,
        RectorLaravel\Rector\MethodCall\RedirectBackToBackHelperRector::class,
        RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector::class,
        RectorLaravel\Rector\MethodCall\RefactorBlueprintGeometryColumnsRector::class,
        // // RectorLaravel\Rector\MethodCall\ReplaceWithoutJobsEventsAndNotificationsWithFacadeFakeRector::class,
        UseComponentPropertyWithinCommandsRector::class,
        RectorLaravel\Rector\MethodCall\ValidationRuleArrayStringValueToArrayRector::class,
        // // RectorLaravel\Rector\Namespace_\FactoryDefinitionRector::class,
        RectorLaravel\Rector\New_\AddGuardToLoginEventRector::class,
        RectorLaravel\Rector\PropertyFetch\ReplaceFakerInstanceWithHelperRector::class,
        RectorLaravel\Rector\StaticCall\DispatchToHelperFunctionsRector::class,
        // RectorLaravel\Rector\StaticCall\MinutesToSecondsInCacheRector::class,
        RectorLaravel\Rector\StaticCall\Redirect301ToPermanentRedirectRector::class,
        // // RectorLaravel\Rector\StaticCall\ReplaceAssertTimesSendWithAssertSentTimesRector::class,
    ])
    ->withRules([
        // // RectorLaravel\Rector\ClassMethod\AddArgumentDefaultValueRector::class,
        // // RectorLaravel\Rector\FuncCall\ArgumentFuncCallToMethodCallRector::class,
        // RectorLaravel\Rector\MethodCall\EloquentOrderByToLatestOrOldestRector::class,
        // RectorLaravel\Rector\MethodCall\ReplaceServiceContainerCallArgRector::class,
        // RectorLaravel\Rector\PropertyFetch\OptionalToNullsafeOperatorRector::class,
        // // RectorLaravel\Rector\StaticCall\EloquentMagicMethodToQueryBuilderRector::class,
        // RectorLaravel\Rector\StaticCall\RouteActionCallableRector::class,
    ])
    ->withConfiguredRule(RectorLaravel\Rector\MethodCall\EloquentOrderByToLatestOrOldestRector::class, [
    ])
    ->withConfiguredRule(RectorLaravel\Rector\MethodCall\ReplaceServiceContainerCallArgRector::class, [
    ])
    ->withConfiguredRule(RectorLaravel\Rector\PropertyFetch\OptionalToNullsafeOperatorRector::class, [
    ])
    ->withConfiguredRule(RectorLaravel\Rector\StaticCall\RouteActionCallableRector::class, [
    ])
    ->withConfiguredRule(RenameFunctionRector::class, [
        'test' => 'it',
    ])
    // ->withConfiguredRule(RenameToPsrNameRector::class, [
    //     '_*',
    // ])
    ->withConfiguredRule(RenameClassRector::class, [
    ])
    ->withConfiguredRule(RenameStaticMethodRector::class, [
    ])
    ->withConfiguredRule(RenameStringRector::class, [
    ])
    ->withConfiguredRule(MethodCallToStaticCallRector::class, [
        // new MethodCallToStaticCall(Music::class, 'createHttpClient', Music::class, 'createHttpClient'),
    ])
    ->withSkip([
        '**/__snapshots__/*',
        '**/Fixtures/*',
        __DIR__.'/.phpstorm.meta.php',
        __DIR__.'/_ide_helper.php',
        __DIR__.'/_ide_helper_models.php',
        __DIR__.'/dcat_admin_ide_helper.php',
        __DIR__.'/deploy.example.php',
        __DIR__.'/deploy.php',
        __DIR__.'/rector-dist.php',
        __FILE__,
    ])
    ->withSkip([
        EncapsedStringsToSprintfRector::class,
        ExplicitBoolCompareRector::class,
        LogicalToBooleanRector::class,
        NewlineAfterStatementRector::class,
        WrapEncapsedVariableInCurlyBracesRector::class,
    ])
    ->withSkip([
        CompactToVariablesRector::class => [
            __DIR__.'/app/Commands/MusicCommand.php',
        ],
        RenameForeachValueVariableToMatchMethodCallReturnTypeRector::class => [
            __DIR__.'/tests/Pest.php',
        ],
        RenamePropertyToMatchTypeRector::class => [
            __DIR__.'/app/Commands/MusicCommand.php',
        ],
        UseComponentPropertyWithinCommandsRector::class => [
            __DIR__.'/app/Commands/InspireCommand.php',
        ],
        StaticArrowFunctionRector::class => $staticClosureSkipPaths = [
            __FILE__,
            __DIR__.'/tests',
        ],
        StaticClosureRector::class => $staticClosureSkipPaths,
    ]);
