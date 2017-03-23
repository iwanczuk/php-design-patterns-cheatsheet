<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Command;

use PhpDesignPatternsCheatsheet\Behavioral\Command\MinusCommand;
use PhpDesignPatternsCheatsheet\Behavioral\Command\Container;
use PHPUnit\Framework\TestCase;

class MinusCommandTest extends TestCase
{
    public function testExecute()
    {
        $container = $this->createMock(Container::class);
        $container->expects($this->once())
            ->method('getValue')
            ->willReturn(0.0);

        $container->expects($this->once())
            ->method('setValue')
            ->with(-1.0);

        $minusCommand = new MinusCommand($container, 1.0);
        $minusCommand->execute();
    }
}
