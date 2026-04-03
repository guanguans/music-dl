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

namespace App\Support;

use App\Exceptions\InvalidArgumentException;
use Composer\Autoload\ClassLoader;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

if (!\function_exists('App\Support\classes')) {
    /**
     * @see https://github.com/illuminate/collections
     * @see https://github.com/alekitto/class-finder
     * @see https://github.com/ergebnis/classy
     * @see https://gitlab.com/hpierce1102/ClassFinder
     * @see https://packagist.org/packages/haydenpierce/class-finder
     * @see \get_declared_classes()
     * @see \get_declared_interfaces()
     * @see \get_declared_traits()
     * @see \Composer\Util\ErrorHandler
     * @see \Composer\Util\Silencer::call()
     * @see \DG\BypassFinals::enable()
     * @see \Illuminate\Foundation\Bootstrap\HandleExceptions::bootstrap()
     * @see \Monolog\ErrorHandler
     * @see \PhpCsFixer\ExecutorWithoutErrorHandler
     * @see \Phrity\Util\ErrorHandler
     *
     * @template TObject of object
     *
     * @internal
     *
     * @param null|(callable(class-string<TObject>, string): bool) $filter
     *
     * @throws \ErrorException
     * @throws \ReflectionException
     *
     * @return \Illuminate\Support\Collection<class-string<TObject>, \ReflectionClass<TObject>>
     *
     * @noinspection PhpUndefinedNamespaceInspection
     */
    function classes(?callable $filter = null): Collection
    {
        $func = __FUNCTION__;
        $errorMessenger = static fn (
            string $file,
            string $class
        ): string => "Failed to reflect the class [$class] in the file [$file]. "
            ."You may need to filter out the class or file using the callback parameter of the function [$func()].";

        /** @var null|array{file: string, class: class-string<TObject>, line: int} $context */
        static $context = null;
        static $registered = false;

        if (!$registered) {
            register_shutdown_function(
                static function () use (&$context, $errorMessenger): void {
                    // @codeCoverageIgnoreStart
                    if (
                        null === $context
                        || null === ($error = error_get_last())
                        || !\in_array($error['type'], [\E_COMPILE_ERROR, \E_CORE_ERROR, \E_ERROR, \E_PARSE], true)
                    ) {
                        return;
                    }

                    // trigger_error($errorMessenger($context['file'], $context['class']), \E_USER_ERROR);
                    throw new \ErrorException(
                        $errorMessenger($context['file'], $context['class']),
                        0,
                        $error['type'],
                        __FILE__,
                        $context['line'],
                        new \ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line'])
                    );
                    // @codeCoverageIgnoreEnd
                }
            );
            $registered = true;
        }

        /** @var null|\Illuminate\Support\Collection<string, class-string> $classes */
        static $classes;
        $classes ??= collect(spl_autoload_functions())->flatMap(
            static fn (callable $loader): array => \is_array($loader) && $loader[0] instanceof ClassLoader
                ? $loader[0]->getClassMap()
                : []
        );
        $filter ??= static fn (string $_, string $__): bool => true;

        return $classes
            ->filter(static fn (string $file, string $class): bool => $filter($class, $file))
            ->mapWithKeys(static function (string $file, string $class) use (&$context, $errorMessenger): array {
                try {
                    $context = ['file' => $file, 'class' => $class, 'line' => __LINE__ + 2];

                    return [$class => new \ReflectionClass($class)];
                } catch (\Throwable $throwable) {
                    // return [$class => $throwable];
                    throw new \ReflectionException($errorMessenger($file, $class), 0, $throwable);
                } finally {
                    $context = null;
                }
            });
    }
}

if (!\function_exists('App\Support\make')) {
    /**
     * @see https://github.com/laravel/framework/blob/12.x/src/Illuminate/Foundation/helpers.php
     * @see https://github.com/yiisoft/yii2/blob/master/framework/BaseYii.php
     *
     * @param array<string, mixed>|string $name
     * @param array<string, mixed> $parameters
     */
    function make(array|string $name, array $parameters = []): mixed
    {
        if (\is_string($name)) {
            return resolve($name, $parameters);
        }

        foreach (
            $keys ??= [
                '__abstract', '__class', '__name',
                '_abstract', '_class', '_name',
                'abstract', 'class', 'name',
            ] as $key
        ) {
            if (isset($name[$key])) {
                return make($name[$key], $parameters + Arr::except($name, $key));
            }
        }

        throw new InvalidArgumentException(
            \sprintf('The argument of name must be an array containing a `%s` element.', implode('` or `', $keys))
        );
    }
}
