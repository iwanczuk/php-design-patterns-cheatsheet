<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Command;

class MinusCommand extends AbstractCommand
{
    public function execute()
    {
        $this->getContainer()->setValue(
            $this->getContainer()->getValue() - $this->getOperand()
        );
    }
}
