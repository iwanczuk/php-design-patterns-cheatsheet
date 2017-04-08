<?php

namespace PhpDesignPatternsCheatsheet\Structural\Proxy;

interface ComputationInterface
{
    /**
     * @param int $input
     * @return int
     */
    public function compute(int $input): int;
}
