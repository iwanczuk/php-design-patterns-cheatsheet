<?php

namespace PhpDesignPatternsCheatsheet\Structural\Facade;

class ComputerFacade
{
    /**
     * @var PowerInterface
     */
    private $power;

    /**
     * @var SystemInterface
     */
    private $system;

    /**
     * @param PowerInterface $power
     * @param SystemInterface $system
     */
    public function __construct(
        PowerInterface $power,
        SystemInterface $system
    ) {
        $this->power = $power;
        $this->system = $system;
    }

    public function boot()
    {
        $this->power->turnOn();
        $this->system->start();
    }

    public function shutdown()
    {
        $this->system->stop();
        $this->power->turnOff();
    }
}
