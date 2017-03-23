<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Command;

class CommandFactory
{
    public function create(string $class, $params): AbstractCommand
    {
        return new $class(...$params);
    }
}
