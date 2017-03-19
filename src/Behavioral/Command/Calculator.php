<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Command;

class Calculator
{
    /**
     * @var Operation[]
     */
    private $operations;

    /**
     * @var Container
     */
    private $container;

    public function __construct()
    {
        $this->operations = [];
        $this->container = new Container();
    }

    /**
     * @param float $value
     */
    public function plus(float $value)
    {
        $this->operations[] = new PlusCommand($this->container, $value);
    }

    /**
     * @param float $value
     */
    public function minus(float $value)
    {
        $this->operations[] = new MinusCommand($this->container, $value);
    }

    /**
     * @return float
     */
    public function calculate(): float
    {
        foreach ($this->operations as $operation) {
            $operation->execute();
        }

        return $this->container->getValue();
    }
}
