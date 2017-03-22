<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\State;

interface EntityInterface
{
    /**
     * @return int
     */
    public function getFatigue(): int;

    /**
     * @param int $fatigue
     */
    public function changeFatigue(int $fatigue);

    /**
     * @return bool
     */
    public function isFatigued(): bool;

    /**
     * @return int
     */
    public function getThirst(): int;

    /**
     * @param int $thirst
     */
    public function changeThirst(int $thirst);

    /**
     * @return bool
     */
    public function isThirsty(): bool;

    /**
     * @param string $class
     */
    public function changeState(string $class);

    public function revertState();
}
