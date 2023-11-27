<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use App\Support\Meting;
use Tests\TestCase;

uses(TestCase::class)
    ->beforeAll(function (): void {})
    ->beforeEach(function (): void {
        app()->extend(Meting::class, static fn (): Meting => mock_meting());
    })
    ->afterEach(function (): void {})
    ->afterAll(function (): void {})
    ->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeTwo', fn (): Pest\Expectation => $this->toBe(2));

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * @noinspection HttpUrlsUsage
 */
function mock_meting(): Meting&Mockery\MockInterface
{
    $mockMeting = Mockery::mock(Meting::class);
    $mockMeting->allows('search')->andReturns('[{"id":28768120,"name":"硬汉","artist":["腰乐队"],"album":"相见恨晚","pic_id":"109951164144451252","url_id":28768120,"lyric_id":28768120,"source":"netease"},{"id":1386737246,"name":"公路之光","artist":["腰乐队"],"album":"他们说忘了摇滚有问题","pic_id":"109951164323917099","url_id":1386737246,"lyric_id":1386737246,"source":"netease"},{"id":28768123,"name":"晚春","artist":["腰乐队"],"album":"相见恨晚","pic_id":"109951164144451252","url_id":28768123,"lyric_id":28768123,"source":"netease"}]');
    $mockMeting->allows('url')->andReturns('{"url":"http://m802.music.126.net/20231125200728/e2f7be51f869df3e345fc6bf7afe9de2/jd-musicrep-ts/740f/2dee/6215/f56c69d40ec9e7d3a62c529121e86385.mp3","size":481115,"br":128.012}');

    return $mockMeting->makePartial();
}

function downloads_path(string $path = ''): string
{
    return base_path('tests/Fixtures/Downloads/'.$path);
}

/**
 * @throws ReflectionException
 */
function class_namespace(object|string $class): string
{
    $class = is_object($class) ? $class::class : $class;

    return (new ReflectionClass($class))->getNamespaceName();
}
