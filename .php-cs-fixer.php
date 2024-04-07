<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$header = <<<'HEADER'
    This file is part of the guanguans/music-dl.

    (c) guanguans <ityaozm@gmail.com>

    This source file is subject to the MIT license that is bundled.
    HEADER;

$finder = Finder::create()
    ->in([
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/resources',
        __DIR__.'/tests',
    ])
    ->exclude([
        '.github/',
        'doc/',
        'docs/',
        'vendor/',
        '__snapshots__/',
    ])
    ->append(glob(__DIR__.'/{*,.*}.php', GLOB_BRACE))
    ->append([
        __DIR__.'/music-dl',
        __DIR__.'/composer-updater',
    ])
    ->notPath([
        'bootstrap/*',
        'storage/*',
        'resources/view/mail/*',
        'vendor/*',
    ])
    ->name('*.php')
    ->notName([
        '*.blade.php',
        '_ide_helper.php',
    ])
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
    ->setCacheFile(__DIR__.'/.php-cs-fixer.cache')
    ->registerCustomFixers(new PhpCsFixerCustomFixers\Fixers())
    // ->registerCustomFixers(new PedroTroller\CS\Fixer\Fixers())
    ->setRules([
        '@PHP70Migration' => true,
        '@PHP70Migration:risky' => true,
        '@PHP71Migration' => true,
        '@PHP71Migration:risky' => true,
        '@PHP73Migration' => true,
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
        '@PHP80Migration' => true,
        '@PHP80Migration:risky' => true,
        '@PHP81Migration' => true,
        // '@PHP82Migration' => true,

        // '@PHPUnit75Migration:risky' => true,
        // '@PHPUnit84Migration:risky' => true,
        '@PHPUnit100Migration:risky' => true,

        // '@DoctrineAnnotation' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,

        // alias
        // 'mb_str_functions' => true,

        // array_notation

        // basic
        'braces_position' => [
            'control_structures_opening_brace' => 'same_line',
            'functions_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'anonymous_functions_opening_brace' => 'same_line',
            'classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'anonymous_classes_opening_brace' => 'same_line',
            'allow_single_line_empty_anonymous_classes' => true,
            'allow_single_line_anonymous_functions' => true,
        ],
        'no_multiple_statements_per_line' => true,

        // casing
        // cast_notation

        // class_notation
        'final_class' => false,
        'final_internal_class' => false,
        'final_public_method_for_abstract_class' => false,
        'ordered_class_elements' => [
            'order' => [
                'use_trait',
                'case',

                'constant_public',
                'constant_protected',
                'constant_private',

                'property_public',
                'property_protected',
                'property_private',

                'construct',
                'destruct',
                'magic',
                'phpunit',

                'method_public',
                'method_protected',
                'method_private',
            ],
            'sort_algorithm' => 'none',
        ],
        'ordered_interfaces' => [
            'order' => 'alpha',
            'direction' => 'ascend',
        ],
        'self_static_accessor' => true,

        // class_usage
        'date_time_immutable' => true,

        // comment
        'header_comment' => [
            'header' => $header,
            'comment_type' => 'PHPDoc',
            'location' => 'after_declare_strict',
            'separate' => 'both',
        ],

        // constant_notation

        // control_structure
        'control_structure_braces' => true,
        'control_structure_continuation_position' => [
            'position' => 'same_line',
        ],
        'empty_loop_condition' => [
            'style' => 'for',
        ],
        'simplified_if_return' => true,

        // doctrine_annotation

        // function_notation
        'date_time_create_from_format_call' => true,
        'native_function_invocation' => [
            'include' => ['@compiler_optimized', 'is_scalar'],
            'exclude' => [],
            'scope' => 'namespaced',
            'strict' => true,
        ],
        'nullable_type_declaration_for_default_null_value' => true,
        // 'phpdoc_to_param_type' => [
        //     'scalar_types' => true,
        // ],
        // 'phpdoc_to_property_type' => [
        //     'scalar_types' => true,
        // ],
        // 'phpdoc_to_return_type' => [
        //     'scalar_types' => true,
        // ],
        'phpdoc_param_order' => true,
        'regular_callable_call' => true,
        'single_line_throw' => false,
        // 'static_lambda' => true, // pest
        'static_lambda' => false, // pest

        // import
        'group_import' => false,

        // language_construct
        'declare_parentheses' => true,

        // list_notation

        // namespace_notation
        // 'no_blank_lines_before_namespace' => false,
        'blank_lines_before_namespace' => true,

        // naming

        // operator
        'logical_operators' => false,
        'no_useless_concat_operator' => [
            'juggle_simple_strings' => true,
        ],
        'not_operator_with_successor_space' => true,

        // php_tag

        // php_unit
        'php_unit_size_class' => [
            'group' => 'small',
        ],
        'php_unit_test_case_static_method_calls' => [
            'call_type' => 'this',
            'methods' => [],
        ],
        'php_unit_test_class_requires_covers' => false,
        'php_unit_data_provider_name' => true,
        'php_unit_data_provider_return_type' => true,

        // phpdoc
        'phpdoc_align' => [
            'align' => 'left',
            'tags' => [
                'method',
                'param',
                'property',
                'return',
                'throws',
                'type',
                'var',
            ],
        ],
        'general_phpdoc_annotation_remove' => [
            'annotations' => [
                'package',
                'subpackage',
            ],
            'case_sensitive' => false,
        ],
        'phpdoc_line_span' => [
            'const' => null,
            'property' => null,
            'method' => 'multi',
        ],
        'phpdoc_no_empty_return' => false,
        'phpdoc_summary' => false,
        'phpdoc_tag_casing' => [
            'tags' => [
                'inheritDoc',
            ],
        ],
        'phpdoc_to_comment' => [
            'ignored_tags' => [
                'covers',
                'coversNothing',
                'dataProvider',
                'deprecated',
                'implements',
                'internal',
                'lang',
                'method',
                'noinspection',
                'param',
                'property',
                'requires',
                'return',
                'runInSeparateProcess',
                'see',
                'var',
            ],
        ],
        'phpdoc_array_type' => true,

        // return_notation
        'simplified_null_return' => true,

        // semicolon
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],

        // strict
        'declare_strict_types' => true,

        // string_notation
        'explicit_string_variable' => false,

        // whitespace
        'blank_line_before_statement' => [
            'statements' => [
                'break',
                'case',
                'continue',
                'declare',
                'default',
                'exit',
                'goto',
                'include',
                'include_once',
                'phpdoc',
                'require',
                'require_once',
                'return',
                'switch',
                'throw',
                'try',
                'yield',
                'yield_from',
            ],
        ],
        'statement_indentation' => true,

        'strict_param' => false,
        'fully_qualified_strict_types' => [
            'import_symbols' => false,
            'leading_backslash_in_global_namespace' => false,
            'phpdoc_tags' => [
                // 'param',
                // 'phpstan-param',
                // 'phpstan-property',
                // 'phpstan-property-read',
                // 'phpstan-property-write',
                // 'phpstan-return',
                // 'phpstan-var',
                // 'property',
                // 'property-read',
                // 'property-write',
                // 'psalm-param',
                // 'psalm-property',
                // 'psalm-property-read',
                // 'psalm-property-write',
                // 'psalm-return',
                // 'psalm-var',
                // 'return',
                // 'see',
                // 'throws',
                // 'var',
            ],
        ],
        'class_definition' => [
            'inline_constructor_arguments' => false,
            'space_before_parenthesis' => false,
        ],

        // https://github.com/kubawerlos/php-cs-fixer-custom-fixers
        // PhpCsFixerCustomFixers\Fixer\CommentSurroundedBySpacesFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\CommentedOutFunctionFixer::name() => [
            'functions' => ['print_r', 'var_dump', 'var_export'],
        ],
        // PhpCsFixerCustomFixers\Fixer\ConstructorEmptyBracesFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\DataProviderNameFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\DataProviderReturnTypeFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\DeclareAfterOpeningTagFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\EmptyFunctionBodyFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\IssetToArrayKeyExistsFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer::name() => [
        //     'minimum_number_of_parameters' => 5,
        //     'keep_blank_lines' => false,
        // ],
        // PhpCsFixerCustomFixers\Fixer\NoCommentedOutCodeFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoDuplicatedArrayKeyFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoLeadingSlashInGlobalNamespaceFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\NoNullableBooleanTypeFixer::name() => false,
        PhpCsFixerCustomFixers\Fixer\NoPhpStormGeneratedCommentFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\NoReferenceInFunctionDefinitionFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoSuperfluousConcatenationFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoTrailingCommaInSinglelineFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessCommentFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessDirnameCallFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessDoctrineRepositoryCommentFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessStrlenFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\NumericLiteralSeparatorFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpUnitAssertArgumentsOrderFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpUnitDedicatedAssertFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpUnitNoUselessReturnFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\PhpdocArrayStyleFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocNoIncorrectVarAnnotationFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\PhpdocOnlyAllowedAnnotationsFixer::name() => [
        //     'elements' => [
        //         'covers',
        //         'coversNothing',
        //         'dataProvider',
        //         'deprecated',
        //         'implements',
        //         'internal',
        //         'method',
        //         'noinspection',
        //         'param',
        //         'property',
        //         'requires',
        //         'return',
        //         'runInSeparateProcess',
        //         'see',
        //         'var',
        //     ],
        // ],
        // PhpCsFixerCustomFixers\Fixer\PhpdocParamOrderFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocParamTypeFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocSelfAccessorFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocSingleLineVarFixer::name() => false,
        // PhpCsFixerCustomFixers\Fixer\PhpdocTypesCommaSpacesFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocTypesTrimFixer::name() => true,
        // PhpCsFixerCustomFixers\Fixer\PhpdocVarAnnotationToAssertFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PromotedConstructorPropertyFixer::name() => [
            'promote_only_existing_properties' => false,
        ],
        // PhpCsFixerCustomFixers\Fixer\ReadonlyPromotedPropertiesFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer::name() => [
            'allow_linebreak' => false,
        ],
        PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer::name() => true,
    ]);
