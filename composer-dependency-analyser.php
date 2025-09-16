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

use ShipMonk\ComposerDependencyAnalyser\Config\Configuration;
use ShipMonk\ComposerDependencyAnalyser\Config\ErrorType;

return (new Configuration)
    ->addPathsToScan(
        [
            __DIR__.'/app/',
            __DIR__.'/bootstrap/',
            __DIR__.'/config/',
            __DIR__.'/resources/',
            __DIR__.'/tests/',
        ],
        false
    )
    ->addPathsToExclude([
        __DIR__.'/tests',
        // __DIR__.'/src/Support/Rectors',
    ])
    ->ignoreUnknownClasses([
    ])
    /** @see \ShipMonk\ComposerDependencyAnalyser\Analyser::CORE_EXTENSIONS */
    ->ignoreErrorsOnExtensions(
        [
            // 'ext-pdo',
            // 'ext-pcntl',
        ],
        [ErrorType::SHADOW_DEPENDENCY]
    )
    ->ignoreErrorsOnPackages(
        [
            'laravel-lang/common',
            'laravel-zero/phar-updater',
            'spatie/fork',
            'symfony/polyfill-php84',
            'symfony/polyfill-php85',
        ],
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackages(
        [
            'composer/xdebug-handler',
            'laravel-lang/config',
            'laravel-lang/locale-list',
            'laravel-lang/routes',
            'laravel-zero/foundation',
            'nunomaduro/laravel-console-summary',
            'psr/http-message',
            'psr/log',
            'symfony/console',
        ],
        [ErrorType::SHADOW_DEPENDENCY]
    )
    ->ignoreErrorsOnPackages(
        [
            'intonate/tinker-zero',
        ],
        [ErrorType::DEV_DEPENDENCY_IN_PROD]
    );
