<?php

use PHPUnit\Framework\TestCase;

class InputValidatorTest extends TestCase
{
    public function testValidInput()
    {
        $validator = new InputValidator();
        $this->assertEquals(1,$validator->validate(1)->getInput());
        $this->assertEquals(1991,$validator->validate(1991)->getInput());
    }

    public function testInvalidInput()
    {
        $validator = new InputValidator();

        $this->expectException(\App\Exceptions\PositiveNumberException::class);
        $this->expectExceptionMessage('Only Positive Integer Numbers are Accepted!');

        $validator->validate(-1);
        $validator->validate(0);
        $validator->validate(1.1);
        $validator->validate('stringMessage');
    }
}