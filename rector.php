<?php

/** @noinspection PhpUnusedAliasInspection */
/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use App\Contracts\Throwable;
use Carbon\Carbon;
use Ergebnis\Rector\Rules\Arrays\SortAssociativeArrayByKeyRector;
use Guanguans\MonorepoBuilderWorker\Support\Rectors\AddNoinspectionsDocCommentToDeclareRector;
use Guanguans\MonorepoBuilderWorker\Support\Rectors\NewExceptionToNewAnonymousExtendsExceptionImplementsRector;
use Guanguans\MonorepoBuilderWorker\Support\Rectors\RemoveNamespaceRector;
use Guanguans\MonorepoBuilderWorker\Support\Rectors\SimplifyListIndexRector;
use Illuminate\Support\Carbon as IlluminateCarbon;
use Illuminate\Support\Str;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\CodeQuality\Rector\LogicalAnd\LogicalToBooleanRector;
use Rector\CodingStyle\Rector\ArrowFunction\StaticArrowFunctionRector;
use Rector\CodingStyle\Rector\Closure\StaticClosureRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\Encapsed\WrapEncapsedVariableInCurlyBracesRector;
use Rector\CodingStyle\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassLike\RemoveAnnotationRector;
use Rector\DowngradePhp81\Rector\Array_\DowngradeArraySpreadStringKeyRector;
use Rector\EarlyReturn\Rector\Return_\ReturnBinaryOrToEarlyReturnRector;
use Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\AddSeeTestAnnotationRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\Transform\Rector\FuncCall\FuncCallToStaticCallRector;
use Rector\Transform\Rector\StaticCall\StaticCallToFuncCallRector;
use Rector\Transform\ValueObject\FuncCallToStaticCall;
use Rector\Transform\ValueObject\StaticCallToFuncCall;
use Rector\ValueObject\PhpVersion;
use Rector\ValueObject\Visibility;
use Rector\Visibility\Rector\ClassMethod\ChangeMethodVisibilityRector;
use Rector\Visibility\ValueObject\ChangeMethodVisibility;
use RectorLaravel\Rector\ArrayDimFetch\ArrayToArrGetRector;
use RectorLaravel\Rector\ArrayDimFetch\ServerVariableToRequestFacadeRector;
use RectorLaravel\Rector\Empty_\EmptyToBlankAndFilledFuncRector;
use RectorLaravel\Rector\FuncCall\HelperFuncCallToFacadeClassRector;
use RectorLaravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector;
use RectorLaravel\Rector\FuncCall\TypeHintTappableCallRector;
use RectorLaravel\Rector\If_\ThrowIfRector;
use RectorLaravel\Rector\MethodCall\ContainerBindConcreteWithClosureOnlyRector;
use RectorLaravel\Rector\MethodCall\UseComponentPropertyWithinCommandsRector;
use RectorLaravel\Rector\MethodCall\ValidationRuleArrayStringValueToArrayRector;
use RectorLaravel\Rector\StaticCall\DispatchToHelperFunctionsRector;
use RectorLaravel\Set\LaravelSetList;
use function App\Support\classes;
use function Illuminate\Filesystem\join_paths;

return RectorConfig::configure()
    ->withAutoloadPaths([
        // __DIR__.'/vendor/symplify/monorepo-builder/vendor/autoload.php',
    ])
    ->withBootstrapFiles([
        __DIR__.'/vendor/symplify/monorepo-builder/vendor/autoload.php',
    ])
    ->withPaths([
        __DIR__.'/app/',
        __DIR__.'/bootstrap/',
        // __DIR__.'/config/',
        // __DIR__.'/database/',
        // __DIR__.'/public/',
        // __DIR__.'/resources/',
        // __DIR__.'/routes/',
        __DIR__.'/tests/',
        ...array_filter(
            glob(__DIR__.'/{*,.*}.php', \GLOB_BRACE),
            static fn (string $filename): bool => !\in_array($filename, [
                __DIR__.'/.phpstorm.meta.php',
                __DIR__.'/_ide_helper.php',
                __DIR__.'/_ide_helper_actions.php',
                __DIR__.'/_ide_helper_models.php',
            ], true)
        ),
        __DIR__.'/composer-updater',
        __DIR__.'/music-dl',
        __DIR__.'/readme-lint',
    ])
    ->withRootFiles()
    // ->withSkipPath(__DIR__.'/tests.php')
    ->withSkip([
        '**.blade.php',
        '**.tinker.php',
        '**/__snapshots__/*',
        '**/Fixtures/*',
        __DIR__.'/bootstrap/providers.php',
        __FILE__,
    ])
    ->withCache(__DIR__.'/.build/rector/')
    ->withParallel()
    // ->withoutParallel()
    // ->withImportNames(importNames: false)
    ->withImportNames(importDocBlockNames: false, importShortClasses: false)
    ->withFluentCallNewLine()
    ->withAttributesSets(phpunit: true, all: true)
    ->withComposerBased(phpunit: true)
    ->withPhpVersion(PhpVersion::PHP_84)
    ->withDowngradeSets(php84: true)
    ->withPhpSets(php84: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        // naming: true,
        instanceOf: true,
        earlyReturn: true,
        carbon: true,
        rectorPreset: true,
        phpunitCodeQuality: true,
    )
    ->withSets([
        PHPUnitSetList::PHPUNIT_120,
        LaravelSetList::LARAVEL_120,
        ...collect(new ReflectionClass(LaravelSetList::class)->getConstants(ReflectionClassConstant::IS_PUBLIC))
            ->reject(
                static fn (string $constant, string $name): bool => \in_array(
                    $name,
                    ['LARAVEL_STATIC_TO_INJECTION', 'LARAVEL_'],
                    true
                ) || preg_match('/^LARAVEL_\d{2,3}$/', $name)
            )
            // ->dd()
            ->values()
            ->all(),
    ])
    ->withRules([
        AddOverrideAttributeToOverriddenMethodsRector::class,
        AddSeeTestAnnotationRector::class,
        ArraySpreadInsteadOfArrayMergeRector::class,
        JsonThrowOnErrorRector::class,
        SimplifyListIndexRector::class,
        SortAssociativeArrayByKeyRector::class,
        StaticArrowFunctionRector::class,
        StaticClosureRector::class,
        ...classes(static fn (string $class): bool => str_starts_with($class, 'RectorLaravel\Rector'))
            ->filter(static fn (ReflectionClass $reflectionClass): bool => $reflectionClass->isInstantiable())
            ->keys()
            // ->dd()
            ->all(),
    ])
    ->withConfiguredRule(AddNoinspectionsDocCommentToDeclareRector::class, [
        'AnonymousFunctionStaticInspection',
        'NullPointerExceptionInspection',
        'PhpPossiblePolymorphicInvocationInspection',
        'PhpUndefinedClassInspection',
        'PhpUnhandledExceptionInspection',
        'PhpVoidFunctionResultUsedInspection',
        'StaticClosureCanBeUsedInspection',
    ])
    ->withConfiguredRule(NewExceptionToNewAnonymousExtendsExceptionImplementsRector::class, [
        Throwable::class,
    ])
    ->withConfiguredRule(RemoveNamespaceRector::class, [
        'Tests',
    ])
    ->withConfiguredRule(RemoveAnnotationRector::class, [
        // 'codeCoverageIgnore',
        'inheritDoc',
        'phpstan-ignore',
        'phpstan-ignore-next-line',
        'psalm-suppress',
    ])
    ->withConfiguredRule(RenameClassRector::class, [
        Carbon::class => IlluminateCarbon::class,
    ])
    // ->withConfiguredRule(FuncCallToStaticCallRector::class, [
    //     new FuncCallToStaticCall('str', Str::class, 'of'),
    // ])
    ->withConfiguredRule(StaticCallToFuncCallRector::class, [
        new StaticCallToFuncCall(Str::class, 'of', 'str'),
    ])
    ->withConfiguredRule(
        ChangeMethodVisibilityRector::class,
        classes(
            static fn (string $class, string $file): bool => str_starts_with($class, 'App')
                && str_starts_with(realpath($file), join_paths(__DIR__, 'app'))
        )
            ->filter(static fn (ReflectionClass $reflectionClass): bool => $reflectionClass->isTrait())
            // ->keys()
            // ->dd()
            ->map(
                static fn (ReflectionClass $reflectionClass): array => collect($reflectionClass->getMethods(ReflectionMethod::IS_PRIVATE))
                    ->reject(static fn (ReflectionMethod $reflectionMethod): bool => $reflectionMethod->isFinal())
                    ->map(
                        static fn (ReflectionMethod $reflectionMethod): ChangeMethodVisibility => new ChangeMethodVisibility(
                            $reflectionClass->getName(),
                            $reflectionMethod->getName(),
                            Visibility::PROTECTED
                        )
                    )
                    ->all()
            )
            ->flatten()
            // ->dd()
            ->values()
            ->all(),
    )
    ->withConfiguredRule(
        RenameFunctionRector::class,
        [
            // 'app' => 'resolve',
            'faker' => 'fake',
            'Pest\Faker\fake' => 'fake',
            'Pest\Faker\faker' => 'faker',
            'test' => 'it',
        ] + array_reduce(
            [
                'classes',
                'make',
            ],
            static function (array $carry, string $func): array {
                /** @see https://github.com/laravel/framework/blob/11.x/src/Illuminate/Support/functions.php */
                $carry[$func] = "App\\Support\\$func";

                return $carry;
            },
            []
        )
    )
    ->withSkip([
        DisallowedEmptyRuleFixerRector::class,
        DowngradeArraySpreadStringKeyRector::class,
        EncapsedStringsToSprintfRector::class,
        ExplicitBoolCompareRector::class,
        LogicalToBooleanRector::class,
        NewlineAfterStatementRector::class,
        ReturnBinaryOrToEarlyReturnRector::class,
        WrapEncapsedVariableInCurlyBracesRector::class,
    ])
    ->withSkip([
        ArrayToArrGetRector::class,
        ContainerBindConcreteWithClosureOnlyRector::class,
        DispatchToHelperFunctionsRector::class,
        EmptyToBlankAndFilledFuncRector::class,
        HelperFuncCallToFacadeClassRector::class,
        ServerVariableToRequestFacadeRector::class,
        ThrowIfRector::class,
        TypeHintTappableCallRector::class,
        ValidationRuleArrayStringValueToArrayRector::class,
    ])
    ->withSkip([
        RemoveDumpDataDeadCodeRector::class => [
            __DIR__.'/tests/Unit/Support/ServerDumperTest.php',
        ],
        UseComponentPropertyWithinCommandsRector::class => [
            __DIR__.'/app/Commands/InspireCommand.php',
        ],
        StaticArrowFunctionRector::class => $staticClosureSkipPaths = [
            __DIR__.'/tests',
            __FILE__,
        ],
        StaticClosureRector::class => $staticClosureSkipPaths,
        SortAssociativeArrayByKeyRector::class => [
            __DIR__.'/app/',
            __DIR__.'/bootstrap/',
            __DIR__.'/tests/',
        ],
        AddNoinspectionsDocCommentToDeclareRector::class => [
            __DIR__.'/app/',
            __DIR__.'/bootstrap/',
            ...glob(__DIR__.'/{*,.*}.php', \GLOB_BRACE),
            __DIR__.'/composer-updater',
            __DIR__.'/music-dl',
            __DIR__.'/readme-lint',
        ],
        NewExceptionToNewAnonymousExtendsExceptionImplementsRector::class => [
            __DIR__.'/composer-updater',
        ],
        RemoveNamespaceRector::class => [
            __DIR__.'/tests/TestCase.php',
        ],
    ]);
