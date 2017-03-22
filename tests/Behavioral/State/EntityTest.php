<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\State;

use PhpDesignPatternsCheatsheet\Behavioral\State\Entity;
use PhpDesignPatternsCheatsheet\Behavioral\State\StateFactory;
use PhpDesignPatternsCheatsheet\Behavioral\State\StateInterface;
use PhpDesignPatternsCheatsheet\Behavioral\State\WorkState;
use PhpDesignPatternsCheatsheet\Behavioral\State\BreakState;
use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    public function testFatigueAndThirst()
    {
        $workState = $this->createMock(StateInterface::class);

        $stateFactory = $this->createMock(StateFactory::class);
        $stateFactory->expects($this->once())
            ->method('create')
            ->with(WorkState::class)
            ->willReturn($workState);

        $entity = new Entity($stateFactory, 0, 0);

        $this->assertEquals(0, $entity->getFatigue());
        $this->assertEquals(0, $entity->getThirst());
        $this->assertFalse($entity->isFatigued());
        $this->assertFalse($entity->isThirsty());

        $entity->changeFatigue(Entity::FATIGUED_THRESHOLD);
        $entity->changeThirst(Entity::THIRSTY_THRESHOLD);

        $this->assertEquals(Entity::FATIGUED_THRESHOLD, $entity->getFatigue());
        $this->assertEquals(Entity::THIRSTY_THRESHOLD, $entity->getThirst());
        $this->assertTrue($entity->isFatigued());
        $this->assertTrue($entity->isThirsty());
    }

    public function testChangeAndRevertState()
    {
        $workState = $this->createMock(StateInterface::class);
        $breakState = $this->createMock(StateInterface::class);

        $stateFactory = $this->createMock(StateFactory::class);
        $stateFactory->expects($this->at(0))
            ->method('create')
            ->with(WorkState::class)
            ->willReturn($workState);

        $stateFactory->expects($this->at(1))
            ->method('create')
            ->with(BreakState::class)
            ->willReturn($breakState);

        $entity = new Entity($stateFactory, 0, 0);

        $entity->changeState(BreakState::class);

        $breakState->expects($this->once())
            ->method('execute')
            ->with($entity);

        $entity->update();

        $workState->expects($this->once())
            ->method('execute')
            ->with($entity);

        $entity->revertState();
        $entity->update();
    }

    public function testUpdate()
    {
        $workState = $this->createMock(StateInterface::class);

        $stateFactory = $this->createMock(StateFactory::class);
        $stateFactory->expects($this->once())
            ->method('create')
            ->with(WorkState::class)
            ->willReturn($workState);

        $entity = new Entity($stateFactory, 0, 0);

        $workState->expects($this->once())
            ->method('execute')
            ->with($entity);

        $entity->update();
    }
}
