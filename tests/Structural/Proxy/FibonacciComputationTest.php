<?php

namespace PhpDesignPatternsCheatsheet\Tests\Structural\Proxy;

use PhpDesignPatternsCheatsheet\Structural\Proxy\FibonacciComputation;
use PHPUnit\Framework\TestCase;

class FibonacciComputationTest extends TestCase
{
    public function testCompute()
    {
        $fixture = [0, 1, 1, 2, 3, 5, 8, 13, 21];
        $computation = new FibonacciComputation();

        foreach ($fixture as $input => $output) {
            $this->assertEquals($output, $computation->compute($input));
        }
    }
}
