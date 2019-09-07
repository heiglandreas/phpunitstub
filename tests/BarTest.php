<?php

declare(strict_types=1);

namespace Org_Heigl\PhpUnitStubTest;

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

use Org_Heigl\PhpUnitStub\UnitTest;
use Org_Heigl\PhpUnitStub\UnitTester;
use PHPUnit\Framework\Assert;

final class BarTest implements UnitTest
{
    use UnitTester;

    public function checkThatSomethingWorks()
    {
        Assert::assertTrue(true);
    }

    public function testFunctionality()
    {
        Assert::assertTrue(true);
    }
}
