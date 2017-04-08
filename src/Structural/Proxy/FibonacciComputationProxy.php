<?php

namespace PhpDesignPatternsCheatsheet\Structural\Proxy;

class FibonacciComputationProxy implements ComputationInterface
{
    /**
     * @var FibonacciComputation
     */
    protected $fibonacciComputation;

    /**
     * @var array
     */
    private $cache;

    public function __construct()
    {
        $this->cache = [];
    }

    /**
     * @return ComputationInterface
     */
    protected function getFibonacciComputation(): ComputationInterface
    {
        if (null === $this->fibonacciComputation) {
            $this->fibonacciComputation = new FibonacciComputation();
        }
        return $this->fibonacciComputation;
    }

    /**
     * @inheritdoc
     */
    public function compute(int $input): int
    {
        if (!isset($this->cache[$input])) {
            $this->cache[$input] = $this->getFibonacciComputation()->compute($input);
        }

        return $this->cache[$input];
    }
}
