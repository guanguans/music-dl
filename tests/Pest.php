<?php

/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection StaticClosureCanBeUsedInspection */
/** @noinspection PhpUndefinedFieldInspection */
/** @noinspection PhpUnused */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\TestResponse;
use Mockery\MockInterface;
use Pest\Expectation;
use Tests\TestCase;

// pest()
//     ->browser()
//     // ->headed()
//     // ->inFirefox()
//     // ->inSafari()
//     ->timeout(10000);
// pest()->only();
// pest()->printer()->compact();
pest()->project()->github('guanguans/music-dl');
pest()
    ->extend(TestCase::class)
    ->beforeAll(function (): void {
        BypassFinals::enable(bypassReadOnly: false);
        BypassFinals::allowPaths([\dirname(__DIR__).'/app/*']);
        BypassFinals::denyPaths(['*/vendor/*']);

        /** @noinspection MkdirRaceConditionInspection */
        is_dir($cacheDirectory = __DIR__.'/../.build/bypass-finals/') or mkdir($cacheDirectory, recursive: true);
        running_in_github_action() or BypassFinals::setCacheDirectory($cacheDirectory);
    })
    ->beforeEach(function (): void {
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
    ->group(__DIR__)
    ->in(
        __DIR__,
        // __DIR__.'/Arch/',
        // __DIR__.'/Feature/',
        // __DIR__.'/Integration/',
        // __DIR__.'/Unit/'
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

/**
 * @see Expectation::toBeBetween()
 */
expect()->extend(
    'toAssert',
    function (Closure $assertions): Expectation {
        $assertions($this->value);

        return $this;
    }
);

/**
 * @see Expectation::toBeBetween()
 */
expect()->extend(
    'toBetween',
    fn (int $min, int $max): Expectation => expect($this->value)
        ->toBeGreaterThanOrEqual($min)
        ->toBeLessThanOrEqual($max)
);

expect()->intercept('toBe', Model::class, function (Model $expected): void {
    expect($this->value->id)->toBe($expected->id);
});

expect()->pipe('toBe', function (Closure $next, mixed $expected): ?Expectation {
    if ($this->value instanceof Model) {
        return expect($this->value->id)->toBe($expected->id);
    }

    return $next();
});

/**
 * @see Expectation::toMatchSnapshot()
 */
expect()->pipe('toMatchSnapshot', function (Closure $next): void {
    $flags = \JSON_INVALID_UTF8_IGNORE |
        \JSON_INVALID_UTF8_SUBSTITUTE |
        \JSON_PARTIAL_OUTPUT_ON_ERROR |
        \JSON_PRESERVE_ZERO_FRACTION |
        \JSON_PRETTY_PRINT |
        \JSON_THROW_ON_ERROR |
        \JSON_UNESCAPED_SLASHES |
        \JSON_UNESCAPED_UNICODE;
    $basePath = \dirname(__DIR__).\DIRECTORY_SEPARATOR;
    $this->value = match (true) {
        $this->value instanceof JsonResponse,
        $this->value instanceof TestResponse => str($this->value->getContent())->remove($basePath)->toString(),
        \is_object($this->value) && method_exists($this->value, '__toString'),
        \is_string($this->value) => str($this->value)->remove($basePath)->toString(),
        \is_array($this->value) => json_encode($this->value, $flags),
        $this->value instanceof Traversable => json_encode(iterator_to_array($this->value), $flags),
        $this->value instanceof JsonSerializable => json_encode($this->value->jsonSerialize(), $flags),
        \is_object($this->value) && method_exists($this->value, 'toArray') => json_encode($this->value->toArray(), $flags),
        default => $this->value,
    };

    $next();
});

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
 * @throws ReflectionException
 */
function class_namespace(object|string $class): string
{
    $class = \is_object($class) ? $class::class : $class;

    return new ReflectionClass($class)->getNamespaceName();
}

function downloads_path(string $path = ''): string
{
    return base_path('tests/Fixtures/Downloads/'.$path);
}

function fixtures_path(string $path = ''): string
{
    return __DIR__.\DIRECTORY_SEPARATOR.'Fixtures'.($path ? \DIRECTORY_SEPARATOR.$path : $path);
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

function reset_http_fake(?Factory $factory = null): void
{
    (function (): void {
        $this->stubCallbacks = collect();
    })->call($factory ?? Http::getFacadeRoot());
}

function running_in_github_action(): bool
{
    return 'true' === getenv('GITHUB_ACTIONS');
}
