<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Strategy;

interface PredicateInterface
{
    /**
     * @param array
     * @return array
     */
    public function filter(array $data): array;
}
