<?php

/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection StaticClosureCanBeUsedInspection */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use App\Music;
use App\Support\Meting;
use DG\BypassFinals;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Http;
use Mockery\MockInterface;
use Pest\Expectation;
use Symfony\Component\Finder\Finder;
use Tests\TestCase;

uses(TestCase::class)
    ->beforeAll(function (): void {
        BypassFinals::enable(bypassReadOnly: false);
        BypassFinals::allowPaths([
            \dirname(__DIR__).'/app/*',
            // '*/app/*',
        ]);
        BypassFinals::denyPaths([
            '*/vendor/*',
        ]);
        BypassFinals::setCacheDirectory(__DIR__.'/../.build/bypass-finals/');

        clear_same_namespace();
    })
    ->beforeEach(function (): void {
        clear_same_namespace();
        app()->extend(Meting::class, static fn (): Meting => mock_meting());
        app()->extend(
            Music::class,
            static fn (Music $music): Music => $music
                ->setHttpClient(new Client([
                    'handler' => HandlerStack::create(new MockHandler([
                        new Response(body: 'foo'),
                    ])),
                ]))
                ->setMeting(mock_meting())
                ->setMinCallMicroseconds(0 * 1000)
        );
    })
    ->afterEach(function (): void {})
    ->afterAll(function (): void {})
    ->in(
        // __DIR__,
        __DIR__.'/Arch',
        __DIR__.'/Feature',
        __DIR__.'/Unit'
    );

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

expect()->extend('toAssert', function (Closure $assertions): Expectation {
    $assertions($this->value);

    return $this;
});

expect()->extend('toBetween', fn (int $min, int $max): Expectation => expect($this->value)
    ->toBeGreaterThanOrEqual($min)
    ->toBeLessThanOrEqual($max));

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
 * @throws \ReflectionException
 */
function class_namespace(object|string $class): string
{
    $class = \is_object($class) ? $class::class : $class;

    return new ReflectionClass($class)->getNamespaceName();
}

function fixtures_path(string $path = ''): string
{
    return __DIR__.'/Fixtures'.($path ? \DIRECTORY_SEPARATOR.$path : $path);
}

function running_in_github_action(): bool
{
    return 'true' === getenv('GITHUB_ACTIONS');
}

function reset_http_fake(?Factory $factory = null): void
{
    (function (): void {
        $this->stubCallbacks = collect();
    })->call($factory ?? Http::getFacadeRoot());
}

/**
 * @noinspection HttpUrlsUsage
 */
function mock_meting(): Meting&MockInterface
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

function clear_same_namespace(): void
{
    foreach (
        Finder::create()
            ->in(__DIR__.'/../vendor/guanguans/ai-commit/app')
            ->name('*.php') as $splFileInfo
    ) {
        file_put_contents($splFileInfo->getPathname(), '');
    }
}
