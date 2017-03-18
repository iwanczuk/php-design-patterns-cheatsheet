<?php

namespace PhpDesignPatternsCheatsheet\Tests\Structural\Facade;

use PhpDesignPatternsCheatsheet\Structural\Facade\ComputerFacade;
use PhpDesignPatternsCheatsheet\Structural\Facade\PowerInterface;
use PhpDesignPatternsCheatsheet\Structural\Facade\SystemInterface;
use PHPUnit\Framework\TestCase;

class ComputerFacadeTest extends TestCase
{
    public function testBoot()
    {
        $power = $this->createMock(PowerInterface::class);
        $power->expects($this->once())
            ->method('turnOn');
        $power->expects($this->never())
            ->method('turnOff');

        $system = $this->createMock(SystemInterface::class);
        $system->expects($this->once())
            ->method('start');
        $system->expects($this->never())
            ->method('stop');

        $computer = new ComputerFacade($power, $system);
        $computer->boot();
    }

    public function testShutdown()
    {
        $power = $this->createMock(PowerInterface::class);
        $power->expects($this->never())
            ->method('turnOn');
        $power->expects($this->once())
            ->method('turnOff');

        $system = $this->createMock(SystemInterface::class);
        $system->expects($this->never())
            ->method('start');
        $system->expects($this->once())
            ->method('stop');

        $computer = new ComputerFacade($power, $system);
        $computer->shutdown();
    }
}
