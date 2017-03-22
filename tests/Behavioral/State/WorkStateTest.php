<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\State;

use PhpDesignPatternsCheatsheet\Behavioral\State\EntityInterface;
use PhpDesignPatternsCheatsheet\Behavioral\State\WorkState;
use PhpDesignPatternsCheatsheet\Behavioral\State\BreakState;
use PhpDesignPatternsCheatsheet\Behavioral\State\DrinkState;
use PHPUnit\Framework\TestCase;

class WorkStateTest extends TestCase
{
    public function testChangeEntity()
    {
        $entity = $this->createMock(EntityInterface::class);
        $entity->expects($this->once())
            ->method('changeFatigue')
            ->with(WorkState::FATIGUE_COST);

        $entity->expects($this->once())
            ->method('changeThirst')
            ->with(WorkState::THIRST_COST);

        $entity->expects($this->never())
            ->method('changeState');

        $state = new WorkState();
        $state->execute($entity);
    }

    public function testChangeStateIfFatigued()
    {
        $entity = $this->createMock(EntityInterface::class);
        $entity->expects($this->once())
            ->method('isFatigued')
            ->willReturn(true);

        $entity->expects($this->once())
            ->method('changeState')
            ->with(BreakState::class);

        $state = new WorkState();
        $state->execute($entity);
    }

    public function testChangeStateIfThirsty()
    {
        $entity = $this->createMock(EntityInterface::class);
        $entity->expects($this->once())
            ->method('isFatigued')
            ->willReturn(false);

        $entity->expects($this->once())
            ->method('isThirsty')
            ->willReturn(true);

        $entity->expects($this->once())
            ->method('changeState')
            ->with(DrinkState::class);

        $state = new WorkState();
        $state->execute($entity);
    }
}
