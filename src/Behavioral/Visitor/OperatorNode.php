<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Visitor;

class OperatorNode extends AbstractNode
{
    const SYMBOL_PLUS = '+';
    const SYMBOL_MINUS = '-';

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var AbstractNode
     */
    private $left;

    /**
     * @var AbstractNode
     */
    private $right;

    /**
     * @param string $symbol
     * @param AbstractNode $left
     * @param AbstractNode $right
     */
    public function __construct(string $symbol, AbstractNode $left, AbstractNode $right)
    {
        $this->symbol = $symbol;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return AbstractNode
     */
    public function getLeft(): AbstractNode
    {
        return $this->left;
    }

    /**
     * @return AbstractNode
     */
    public function getRight(): AbstractNode
    {
        return $this->right;
    }

    /**
     * @inheritdoc
     */
    public function accept(VisitorInterface $visitor)
    {
        if ($left = $this->getLeft()) {
            $left->accept($visitor);
        }

        if ($right = $this->getRight()) {
            $right->accept($visitor);
        }

        $visitor->visitOperatorNode($this);
    }
}
