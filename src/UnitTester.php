<?php

declare(strict_types=1);

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\PhpUnitStub;

use PHPUnit\Framework\TestResult;

trait UnitTester
{
    private $testRunner;

    private $methodName;

    public function __construct(TestRunner $testRunner, string $methodName)
    {
        $this->testRunner = $testRunner;
        $this->testRunner->setName($methodName);
        $this->methodName = $methodName;
    }

    public function getName() : string
    {
        return $this->methodName;
    }

    public function count()
    {
        return 1;
    }

    /**
     * Runs a test and collects its result in a TestResult instance.
     */
    public function run(TestResult $result = null) : TestResult
    {
        $this->testRunner->setTestClass($this);
        $result->run($this->testRunner);

        return $result;
    }

    public static function getTestMethods() : array
    {
        return array_filter(get_class_methods(static::class), function ($method) {
            return strpos(strtolower($method), 'checkthat') === 0;
        });
    }
}