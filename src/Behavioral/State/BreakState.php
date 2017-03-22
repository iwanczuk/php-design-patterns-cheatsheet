<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\State;

class BreakState implements StateInterface
{
    const FATIGUE_COST = -3;
    const THIRST_COST = 1;

    /**
     * @param EntityInterface $entity
     */
    public function execute(EntityInterface $entity)
    {
        $entity->changeFatigue(static::FATIGUE_COST);
        $entity->changeThirst(static::THIRST_COST);

        if ($entity->getFatigue() <= 0) {
            $entity->revertState();
        }
    }
}
