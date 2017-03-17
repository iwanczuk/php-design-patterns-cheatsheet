<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Strategy;

class PredicateStrategy
{
    /**
     * @var PredicateInterface
     */
    private $predicate;

    /**
     * @var array
     */
    private $data;

    /**
     * @param PredicateInterface $predicate
     * @param array $data
     */
    public function __construct(PredicateInterface $predicate, array $data)
    {
        $this->predicate = $predicate;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function filter(): array
    {
        return $this->predicate->filter($this->data);
    }
}
