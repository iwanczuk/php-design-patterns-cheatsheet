<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Strategy;

class OddPredicate implements PredicateInterface
{
    /**
     * @inheritdoc
     */
    public function filter(array $data): array
    {
        $result = [];

        foreach ($data as $value) {
            if ($value % 2) {
                $result[] = $value;
            }
        }

        return $result;
    }
}
