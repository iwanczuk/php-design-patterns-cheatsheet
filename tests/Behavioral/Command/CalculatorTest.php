<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Command;

use PhpDesignPatternsCheatsheet\Behavioral\Command\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testResult()
    {
        $calculator = new Calculator();
        $calculator->plus(5);
        $calculator->minus(4);
        $this->assertEquals(1, $calculator->calculate());
    }
}
