<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Command;

use PhpDesignPatternsCheatsheet\Behavioral\Command\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function testChangeValue()
    {
        $container = new Container();
        $this->assertEquals(0.0, $container->getValue());
        $container->setValue(1.0);
        $this->assertEquals(1.0, $container->getValue());
    }
}
