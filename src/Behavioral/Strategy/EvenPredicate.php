<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Strategy;

class EvenPredicate implements PredicateInterface
{
    /**
     * @inheritdoc
     */
    public function filter(array $data): array
    {
        $result = [];

        foreach ($data as $value) {
            if (0 === ($value % 2)) {
                $result[] = $value;
            }
        }

        return $result;
    }
}
