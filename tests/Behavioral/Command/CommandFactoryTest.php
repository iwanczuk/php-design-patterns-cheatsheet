<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Command;

use PhpDesignPatternsCheatsheet\Behavioral\Command\CommandFactory;
use PhpDesignPatternsCheatsheet\Behavioral\Command\Container;
use PhpDesignPatternsCheatsheet\Behavioral\Command\AbstractCommand;
use PhpDesignPatternsCheatsheet\Behavioral\Command\PlusCommand;
use PHPUnit\Framework\TestCase;

class CommandFactoryTest extends TestCase
{
    public function testCreate()
    {
        $container = $this->createMock(Container::class);

        $commandFactory = new CommandFactory();
        $this->assertInstanceOf(AbstractCommand::class, $commandFactory->create(PlusCommand::class, [$container, 0.0]));
    }
}
