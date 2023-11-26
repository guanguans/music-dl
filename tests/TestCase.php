<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests;

use LaravelZero\Framework\Testing\TestCase as BaseTestCase;
use phpmock\phpunit\PHPMock;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use PHPMock;

    /**
     * This method is called before the first test of this test class is run.
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public static function setUpBeforeClass(): void {}

    /**
     * This method is called after the last test of this test class is run.
     *
     * @noinspection SenselessProxyMethodInspection
     */
    #[\Override]
    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
    }

    /**
     * This method is called before each test.
     *
     * @noinspection SenselessProxyMethodInspection
     */
    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * This method is called after each test.
     */
    #[\Override]
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->finish();
        \Mockery::close();
    }

    /**
     * Run extra tear down code.
     */
    protected function finish(): void
    {
        // call more tear down methods
    }
}
