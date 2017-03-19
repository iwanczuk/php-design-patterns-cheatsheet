<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Command;

class Container
{
    /**
     * @var float
     */
    private $value;

    public function __construct()
    {
        $this->value = 0.0;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
