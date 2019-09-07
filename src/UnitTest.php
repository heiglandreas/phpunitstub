<?php

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\PhpUnitStub;

use PHPUnit\Framework\Test;

interface UnitTest extends Test
{
    public function __construct(TestRunner $testRunner, string $methodName);

    /**
     * @return string[]
     */
    public static function getTestMethods() : array;

    public function getName() : string;
}