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

use Composer\Autoload\ClassLoader;
use Illuminate\Support\Collection;

if (!\function_exists('App\Support\classes')) {
    /**
     * @see https://github.com/alekitto/class-finder
     * @see https://github.com/ergebnis/classy
     * @see https://gitlab.com/hpierce1102/ClassFinder
     * @see https://packagist.org/packages/haydenpierce/class-finder
     * @see \get_declared_classes()
     * @see \get_declared_interfaces()
     * @see \get_declared_traits()
     * @see \DG\BypassFinals::enable()
     *
     * @noinspection RedundantDocCommentTagInspection
     *
     * @param callable(string, class-string): bool $filter
     */
    function classes(callable $filter): Collection
    {
        static $allClasses;

        $allClasses ??= collect(spl_autoload_functions())->flatMap(
            static fn (mixed $loader): array => \is_array($loader) && $loader[0] instanceof ClassLoader
                ? $loader[0]->getClassMap()
                : []
        );

        return $allClasses
            ->filter($filter)
            ->mapWithKeys(static function (string $file, string $class): array {
                try {
                    return [$class => new ReflectionClass($class)];
                } catch (Throwable $throwable) {
                    return [$class => $throwable];
                }
            });
    }
}

if (!\function_exists('array_reduce_with_keys')) {
    /**
     * @codeCoverageIgnore
     */
    function array_reduce_with_keys(array $array, callable $callback, mixed $carry = null): mixed
    {
        foreach ($array as $key => $value) {
            $carry = $callback($carry, $value, $key);
        }

        return $carry;
    }
}
