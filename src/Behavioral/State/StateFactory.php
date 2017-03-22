<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\State;

class StateFactory
{
    public function create(string $class): StateInterface
    {
        return new $class;
    }
}
