<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Command;

class Calculator
{
    /**
     * @var AbstractCommand[]
     */
    private $commands;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var CommandFactory
     */
    private $commandFactory;

    public function __construct(CommandFactory $commandFactory)
    {
        $this->commands = [];
        $this->container = new Container();
        $this->commandFactory = $commandFactory;
    }

    /**
     * @param float $value
     */
    public function plus(float $value)
    {
        $this->commands[] = $this->commandFactory->create(PlusCommand::class, [$this->container, $value]);
    }

    /**
     * @param float $value
     */
    public function minus(float $value)
    {
        $this->commands[] = $this->commandFactory->create(MinusCommand::class, [$this->container, $value]);
    }

    /**
     * @return float
     */
    public function calculate(): float
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }

        return $this->container->getValue();
    }
}
