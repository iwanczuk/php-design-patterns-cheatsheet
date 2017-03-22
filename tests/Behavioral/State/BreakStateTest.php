<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\State;

use PhpDesignPatternsCheatsheet\Behavioral\State\EntityInterface;
use PhpDesignPatternsCheatsheet\Behavioral\State\BreakState;
use PHPUnit\Framework\TestCase;

class BreakStateTest extends TestCase
{
    public function testChangeEntity()
    {
        $entity = $this->createMock(EntityInterface::class);
        $entity->expects($this->once())
            ->method('changeFatigue')
            ->with(BreakState::FATIGUE_COST);

        $entity->expects($this->once())
            ->method('changeThirst')
            ->with(BreakState::THIRST_COST);

        $entity->expects($this->once())
            ->method('getFatigue')
            ->willReturn(1);

        $entity->expects($this->never())
            ->method('revertState');

        $state = new BreakState();
        $state->execute($entity);
    }

    public function testRevertStateIfNotFatigued()
    {
        $entity = $this->createMock(EntityInterface::class);
        $entity->expects($this->once())
            ->method('getFatigue')
            ->willReturn(0);

        $entity->expects($this->once())
            ->method('revertState');

        $state = new BreakState();
        $state->execute($entity);
    }
}
