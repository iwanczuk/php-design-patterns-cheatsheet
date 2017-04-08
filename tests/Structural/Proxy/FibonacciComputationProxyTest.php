<?php

namespace PhpDesignPatternsCheatsheet\Tests\Structural\Proxy;

use PhpDesignPatternsCheatsheet\Structural\Proxy\ComputationInterface;
use PhpDesignPatternsCheatsheet\Structural\Proxy\ComputationFactory;
use PhpDesignPatternsCheatsheet\Structural\Proxy\FibonacciComputationProxy;
use PHPUnit\Framework\TestCase;

class FibonacciComputationProxyTest extends TestCase
{
    public function testComputeCache()
    {
        $fixture = 5;

        $fibonacciComputationProxy = new class extends FibonacciComputationProxy {
            public function setFibonacciComputation(ComputationInterface $fibonacciComputation) {
                $this->fibonacciComputation = $fibonacciComputation;
            }
        };

        $fibonacciComputation = $this->createMock(ComputationInterface::class);
        $fibonacciComputation->expects($this->once())
            ->method('compute')
            ->with($fixture)
            ->willReturn($fixture);

        $fibonacciComputationProxy->setFibonacciComputation($fibonacciComputation);

        $this->assertEquals(
            $fibonacciComputationProxy->compute($fixture),
            $fibonacciComputationProxy->compute($fixture)
        );
    }
}
