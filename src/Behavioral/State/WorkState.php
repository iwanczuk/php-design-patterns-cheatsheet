<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\State;

class WorkState implements StateInterface
{
    const FATIGUE_COST = 3;
    const THIRST_COST = 2;

    /**
     * @param EntityInterface $entity
     */
    public function execute(EntityInterface $entity)
    {
        $entity->changeFatigue(static::FATIGUE_COST);
        $entity->changeThirst(static::THIRST_COST);

        if ($entity->isFatigued()) {
            $entity->changeState(BreakState::class);
        } elseif ($entity->isThirsty()) {
            $entity->changeState(DrinkState::class);
        }
    }
}
