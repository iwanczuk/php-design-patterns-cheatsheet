<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Visitor;

class OperandNode extends AbstractNode
{
    /**
     * @var float
     */
    private $value;

    /**
     * @param float $value
     */
    public function __construct(float $value)
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

    /**
     * @inheritdoc
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitOperandNode($this);
    }
}
