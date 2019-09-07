<?php

declare(strict_types=1);

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\PhpUnitStub;

use PHPUnit\Framework\TestCase as AbstractTestCase;
use PHPUnit\Framework\Test;

class TestCase extends AbstractTestCase implements TestRunner
{
    private $testCase;

    public function __call($method, $args)
    {
        if (! method_exists($this->testCase, $method)) {
            return;
        }

        $this->testCase->$method(...$args);
    }

    public function setTestClass(Test $test) : void
    {
        $this->testCase = $test;
    }
}