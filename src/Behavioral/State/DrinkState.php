<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\State;

class DrinkState implements StateInterface
{
    const FATIGUE_COST = 0;
    const THIRST_COST = -4;

    /**
     * @param EntityInterface $entity
     */
    public function execute(EntityInterface $entity)
    {
        $entity->changeFatigue(static::FATIGUE_COST);
        $entity->changeThirst(static::THIRST_COST);

        if ($entity->getThirst() <= 0) {
            $entity->revertState();
        }
    }
}
