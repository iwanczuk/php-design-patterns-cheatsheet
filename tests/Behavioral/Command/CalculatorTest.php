<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Command;

use PhpDesignPatternsCheatsheet\Behavioral\Command\Calculator;
use PhpDesignPatternsCheatsheet\Behavioral\Command\CommandFactory;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculate()
    {
        $calculator = new Calculator(new CommandFactory());
        $calculator->plus(5);
        $calculator->minus(4);
        $this->assertEquals(1, $calculator->calculate());
    }
}
