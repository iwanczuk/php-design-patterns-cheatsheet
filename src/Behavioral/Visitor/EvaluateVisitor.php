<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Visitor;

class EvaluateVisitor implements VisitorInterface
{
    /**
     * @var float[]
     */
    private $stack = [];

    /**
     * @return float
     */
    public function getValue(): float
    {
        return end($this->stack) ?: 0.0;
    }

    /**
     * @param OperandNode
     */
    public function visitOperandNode(OperandNode $node)
    {
        $this->pushValue($node->getValue());
    }

    /**
     * @param OperatorNode
     */
    public function visitOperatorNode(OperatorNode $node)
    {
        $b = $this->popValue();
        $a = $this->popValue();

        switch ($node->getSymbol()) {
            case OperatorNode::SYMBOL_PLUS:
                $this->pushValue($a + $b);
                break;

            case OperatorNode::SYMBOL_MINUS:
                $this->pushValue($a - $b);
                break;
        }
    }

    /**
     * @param float $value
     */
    private function pushValue(float $value)
    {
        array_push($this->stack, $value);
    }

    /**
     * @return float
     */
    private function popValue()
    {
        return array_pop($this->stack);
    }
}
