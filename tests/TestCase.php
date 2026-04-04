<?php

/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection StaticClosureCanBeUsedInspection */
/** @noinspection PhpMissingParentCallCommonInspection */
/** @noinspection PhpUnusedAliasInspection */
/** @noinspection SqlResolve */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use LaravelZero\Framework\Testing\TestCase as BaseTestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use phpmock\phpunit\PHPMock;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;

abstract class TestCase extends BaseTestCase
{
    // use DatabaseMigrations;
    // use DatabaseTransactions;
    // use DatabaseTruncation;
    // use InteractsWithViews;
    // use LazilyRefreshDatabase;
    // use WithCachedConfig;
    // use WithCachedRoutes;

    use MockeryPHPUnitIntegration;
    use PHPMock;
    use VarDumperTestTrait;

    /**
     * This method is called before the first test of this test class is run.
     */
    #[\Override]
    public static function setUpBeforeClass(): void {}

    // /**
    //  * This method is called after the last test of this test class is run.
    //  */
    // public static function tearDownAfterClass(): void {}

    // /**
    //  * This method is called before each test.
    //  */
    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     // \DG\BypassFinals::enable(bypassReadOnly: false);
    // }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
     */
    #[\Override]
    protected function assertPreConditions(): void {}

    // /**
    //  * Performs assertions shared by all tests of a test case.
    //  *
    //  * This method is called between test and tearDown().
    //  *
    //  * @see \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegrationAssertPostConditions::assertPostConditions()
    //  * @see \Mockery\Adapter\Phpunit\MockeryTestCase
    //  */
    // protected function assertPostConditions(): void {}

    // /**
    //  * This method is called after each test.
    //  */
    // protected function tearDown(): void {}
}
