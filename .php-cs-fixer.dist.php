<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use Ergebnis\PhpCsFixer\Config\Factory;
use Ergebnis\PhpCsFixer\Config\Fixers;
use Ergebnis\PhpCsFixer\Config\Rules;
use Ergebnis\PhpCsFixer\Config\RuleSet\Php85;
use Guanguans\PhpCsFixerCustomFixers\Support\Utils;

require __DIR__.'/vendor/autoload.php';

return Factory::fromRuleSet(Php85::create()
    ->withHeader(Utils::header('guanguans/music-dl', '2019', __DIR__.'/LICENSE'))
    ->withCustomFixers(Fixers::fromFixers(... require __DIR__.'/vendor/guanguans/php-cs-fixer-custom-fixers/config/custom-fixers.php'))
    ->withRules(Rules::fromArray(require __DIR__.'/vendor/guanguans/php-cs-fixer-custom-fixers/config/custom-rules.php'))
    ->withRules(Rules::fromArray(require __DIR__.'/vendor/guanguans/php-cs-fixer-custom-fixers/config/rules.php'))
    ->withRules(Rules::fromArray([
        '@autoPHPUnitMigration:risky' => true,
        'PhpCsFixerCustomFixers/no_useless_dirname_call' => false,
        'final_public_method_for_abstract_class' => false,
    ])))
    ->setUsingCache(true)
    ->setCacheFile(\sprintf('%s/.build/php-cs-fixer/%s.cache', __DIR__, pathinfo(__FILE__, \PATHINFO_FILENAME)))
    ->setUnsupportedPhpVersionAllowed(true)
    ->setFinder(Utils::defaultFinder()->exclude(['resources/lang/']));
