<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Command;

abstract class AbstractCommand
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var float
     */
    private $operand;

    /**
     * @param Container $container
     * @param float $operand
     */
    public function __construct(Container $container, float $operand)
    {
        $this->container = $container;
        $this->operand = $operand;
    }

    /**
     * @return Container
     */
    protected function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * @return float
     */
    protected function getOperand(): float
    {
        return $this->operand;
    }

    public abstract function execute();
}
