<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\State;

use PhpDesignPatternsCheatsheet\Behavioral\State\StateFactory;
use PhpDesignPatternsCheatsheet\Behavioral\State\WorkState;
use PHPUnit\Framework\TestCase;

class StateFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new StateFactory();
        $this->assertInstanceOf(WorkState::class, $factory->create(WorkState::class));
    }
}
