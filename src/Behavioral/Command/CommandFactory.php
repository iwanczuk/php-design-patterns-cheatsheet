<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Command;

class CommandFactory
{
    /**
     * @param string $class
     * @param array $params
     * @return AbstractCommand
     */
    public function create(string $class, array $params): AbstractCommand
    {
        return new $class(...$params);
    }
}
