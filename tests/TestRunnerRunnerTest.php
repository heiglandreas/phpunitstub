<?php

declare(strict_types=1);

namespace Org_Heigl\PhpUnitStubTest;

use PHPUnit\Framework\TestCase;

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */
class TestRunnerRunnerTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testSometing()
    {
        $this->assertTrue('false');
    }
}
