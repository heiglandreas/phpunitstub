<?php

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\PhpUnitStub;

use PHPUnit\Framework\Test;

interface TestRunner extends Test
{
    public function setTestClass(Test $test) : void;

    public function setName(string $name) : void;
}