<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\State;

use PhpDesignPatternsCheatsheet\Behavioral\State\EntityInterface;
use PhpDesignPatternsCheatsheet\Behavioral\State\DrinkState;
use PHPUnit\Framework\TestCase;

class DrinkStateTest extends TestCase
{
    public function testChangeEntity()
    {
        $entity = $this->createMock(EntityInterface::class);
        $entity->expects($this->once())
            ->method('changeFatigue')
            ->with(DrinkState::FATIGUE_COST);

        $entity->expects($this->once())
            ->method('changeThirst')
            ->with(DrinkState::THIRST_COST);

        $entity->expects($this->once())
            ->method('getThirst')
            ->willReturn(1);

        $entity->expects($this->never())
            ->method('revertState');

        $state = new DrinkState();
        $state->execute($entity);
    }

    public function testRevertStateIfNotThirsty()
    {
        $entity = $this->createMock(EntityInterface::class);
        $entity->expects($this->once())
            ->method('getThirst')
            ->willReturn(0);

        $entity->expects($this->once())
            ->method('revertState');

        $state = new DrinkState();
        $state->execute($entity);
    }
}
