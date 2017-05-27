<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Visitor;

class PrintVisitor implements VisitorInterface
{
    /**
     * @var string[]
     */
    private $elements = [];

    /**
     * @param OperandNode
     */
    public function visitOperandNode(OperandNode $node)
    {
        $this->elements[] = (string) $node->getValue();
    }

    /**
     * @param OperatorNode
     */
    public function visitOperatorNode(OperatorNode $node)
    {
        $this->elements[] = $node->getSymbol();
    }

    /**
     * @return string
     */
    public function getOutput(): string
    {
        return join(' ', $this->elements);
    }
}
