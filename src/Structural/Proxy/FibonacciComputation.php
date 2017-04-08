<?php

namespace PhpDesignPatternsCheatsheet\Structural\Proxy;

class FibonacciComputation implements ComputationInterface
{
    /**
     * @inheritdoc
     */
    public function compute(int $input): int
    {
        if ($input <= 1) {
            return $input;
        }

        $first = 0;
        $second = 1;
        $output = 0;

        for ($i = 1; $i < $input; $i++) {
            $output = $first + $second;
            $first = $second;
            $second = $output;
        }

        return $output;
    }
}
