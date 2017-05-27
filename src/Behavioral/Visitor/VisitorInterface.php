<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Visitor;

interface VisitorInterface
{
    /**
     * @param OperandNode
     */
    public function visitOperandNode(OperandNode $node);

    /**
     * @param OperatorNode
     */
    public function visitOperatorNode(OperatorNode $node);
}
