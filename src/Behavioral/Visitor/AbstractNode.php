<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Visitor;

abstract class AbstractNode
{
    /**
     * @param VisitorInterface $visitor
     */
    public abstract function accept(VisitorInterface $visitor);
}
