<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\State;

class Entity implements EntityInterface
{
    const FATIGUED_THRESHOLD = 100;
    const THIRSTY_THRESHOLD = 100;

    /**
     * @var StateFactory
     */
    private $stateFactory;

    /**
     * @var StateInterface
     */
    private $stateCurrent;

    /**
     * @var StateInterface
     */
    private $stateLast;

    /**
     * @var int
     */
    private $fatigue;

    /**
     * @var int
     */
    private $thirst;

    /**
     * @param StateFactory $stateFactory
     * @param int $fatigue
     * @param int $thirst
     */
    public function __construct(StateFactory $stateFactory, int $fatigue, int $thirst)
    {
        $this->stateFactory = $stateFactory;

        $this->changeFatigue($fatigue);
        $this->changeThirst($thirst);
        $this->changeState(WorkState::class);
    }

    /**
     * @return int
     */
    public function getFatigue(): int
    {
        return $this->fatigue;
    }

    /**
     * @param int $fatigue
     */
    public function changeFatigue(int $fatigue)
    {
        $this->fatigue += $fatigue;
    }

    /**
     * @return bool
     */
    public function isFatigued(): bool
    {
        return $this->getFatigue() >= static::FATIGUED_THRESHOLD;
    }

    /**
     * @return int
     */
    public function getThirst(): int
    {
        return $this->thirst;
    }

    /**
     * @param int $thirst
     */
    public function changeThirst(int $thirst)
    {
        $this->thirst += $thirst;
    }

    /**
     * @return bool
     */
    public function isThirsty(): bool
    {
        return $this->getThirst() >= static::THIRSTY_THRESHOLD;
    }

    /**
     * @param string $class
     */
    public function changeState(string $class)
    {
        list($this->stateCurrent, $this->stateLast) = [
            $this->stateFactory->create($class),
            $this->stateCurrent
        ];
    }

    public function revertState()
    {
        list($this->stateCurrent, $this->stateLast) = [
            $this->stateLast,
            $this->stateCurrent
        ];
    }

    public function update()
    {
        $this->stateCurrent->execute($this);
    }
}
