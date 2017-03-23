<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Command;

use PhpDesignPatternsCheatsheet\Behavioral\Command\PlusCommand;
use PhpDesignPatternsCheatsheet\Behavioral\Command\Container;
use PHPUnit\Framework\TestCase;

class PlusCommandTest extends TestCase
{
    public function testExecute()
    {
        $container = $this->createMock(Container::class);
        $container->expects($this->once())
            ->method('getValue')
            ->willReturn(0.0);

        $container->expects($this->once())
            ->method('setValue')
            ->with(1.0);

        $plusCommand = new PlusCommand($container, 1.0);
        $plusCommand->execute();
    }
}
