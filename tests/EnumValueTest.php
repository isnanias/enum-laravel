<?php

namespace IsnanIas\Enum\Tests;

use PHPUnit\Framework\TestCase;
use IsnanIas\Enum\Rules\EnumValue;

class EnumValueTest extends TestCase
{
    public function testValidationPasses()
    {
        $passes1 = (new EnumValue(UserType::class))->passes('', 3);
        $passes2 = (new EnumValue(UserType::class))->passes('', '3');

        $this->assertTrue($passes1);
        $this->assertTrue($passes2);
    }

    public function testValidationFails()
    {
        $fails1 = (new EnumValue(UserType::class))->passes('', 7);
        $fails2 = (new EnumValue(UserType::class))->passes('', 'test');

        $this->assertFalse($fails1);
        $this->assertFalse($fails2);
    }
}
