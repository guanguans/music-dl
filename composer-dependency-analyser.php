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
    /** @see composer.json -> autoload */
    /** @see composer.json -> autoload-dev */
    ->addPathsToScan(
        [
            // __DIR__.'/app/',
            __DIR__.'/bootstrap/',
            __DIR__.'/config/',
            __DIR__.'/resources/',
            // __DIR__.'/tests/',
            __DIR__.'/music-dl',
        ],
        false
    )
    ->addPathsToExclude([
        __DIR__.'/tests/',
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
            'laravel-zero/phar-updater',
            'spatie/fork',
        ],
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackages(
        [
            'composer/xdebug-handler',
            'guzzlehttp/guzzle',
            'laravel-zero/foundation',
            'laravel/prompts',
            'nunomaduro/laravel-console-summary',
            'psr/http-message',
            'symfony/console',
        ],
        [ErrorType::SHADOW_DEPENDENCY]
    )
    ->ignoreErrorsOnPackages(
        [
            // 'guanguans/ai-commit',
        ],
        [ErrorType::DEV_DEPENDENCY_IN_PROD]
    );
