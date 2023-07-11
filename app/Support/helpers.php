<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

if (! function_exists('array_reduce_with_keys')) {
    function array_reduce_with_keys(array $array, callable $callback, mixed $carry = null): mixed
    {
        foreach ($array as $key => $value) {
            $carry = $callback($carry, $value, $key);
        }

        return $carry;
    }
}

if (! function_exists('array_map_with_keys')) {
    function array_map_with_keys(callable $callback, array $array): array
    {
        $arr = [];
        foreach ($array as $key => $value) {
            $arr[$key] = $callback($value, $key);
        }

        return $arr;
    }
}
