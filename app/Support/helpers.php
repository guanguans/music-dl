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

namespace App\Support;

use App\Exceptions\InvalidArgumentException;
use Composer\Autoload\ClassLoader;
use Illuminate\Support\Arr;
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
     * @see \Composer\Util\ErrorHandler
     * @see \Monolog\ErrorHandler
     * @see \PhpCsFixer\ExecutorWithoutErrorHandler
     * @see \Phrity\Util\ErrorHandler
     *
     * @noinspection RedundantDocCommentTagInspection
     *
     * @param null|(callable(class-string, string): bool) $filter
     *
     * @return \Illuminate\Support\Collection<class-string, \ReflectionClass>
     */
    function classes(?callable $filter = null): Collection
    {
        static $classes;

        $classes ??= collect(spl_autoload_functions())->flatMap(
            static fn (mixed $loader): array => \is_array($loader) && $loader[0] instanceof ClassLoader
                ? $loader[0]->getClassMap()
                : []
        );

        return $classes
            ->when(
                \is_callable($filter),
                static fn (Collection $classes): Collection => $classes->filter(
                    static function (string $file, string $class) use ($filter) {
                        /** @var callable $filter */
                        return $filter($class, $file);
                    }
                )
            )
            ->mapWithKeys(static function (string $file, string $class): array {
                try {
                    // return [$class => (new ErrorHandler)->with(static fn () => new ReflectionClass($class))];
                    return [$class => new \ReflectionClass($class)];
                } catch (\Throwable $throwable) {
                    return [$class => $throwable];
                }
            });
    }
}

if (!\function_exists('App\Support\make')) {
    /**
     * @see https://github.com/laravel/framework/blob/12.x/src/Illuminate/Foundation/helpers.php
     * @see https://github.com/yiisoft/yii2/blob/master/framework/BaseYii.php
     *
     * @template TClass of object
     *
     * @param array<string, mixed>|class-string<TClass>|string $name
     * @param array<string, mixed> $parameters
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     * @return ($name is class-string<TClass> ? TClass : mixed)
     */
    function make(array|string $name, array $parameters = []): mixed
    {
        if (\is_string($name)) {
            return resolve($name, $parameters);
        }

        foreach (
            $keys = [
                '__abstract',
                '__class',
                '__name',
                '_abstract',
                '_class',
                '_name',
                'abstract',
                'class',
                'name',
            ] as $key
        ) {
            if (isset($name[$key])) {
                return make($name[$key], $parameters + Arr::except($name, $key));
            }
        }

        throw new InvalidArgumentException(\sprintf(
            'The argument of abstract must be an array containing a `%s` element.',
            implode('` or `', $keys)
        ));
    }
}
