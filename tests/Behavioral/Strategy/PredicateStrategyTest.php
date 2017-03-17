<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Strategy;

use PhpDesignPatternsCheatsheet\Behavioral\Strategy\PredicateStrategy;
use PhpDesignPatternsCheatsheet\Behavioral\Strategy\EvenPredicate;
use PhpDesignPatternsCheatsheet\Behavioral\Strategy\OddPredicate;
use PHPUnit\Framework\TestCase;

class PredicateStrategyTest extends TestCase
{
    public function testPredicate()
    {
        $fixture = [
            5, 2, 9, 6, 2, 3
        ];

        $evenStrategy = new PredicateStrategy(new EvenPredicate(), $fixture);

        $this->assertSame([2, 6, 2], $evenStrategy->filter());

        $oddStrategy = new PredicateStrategy(new OddPredicate(), $fixture);

        $this->assertSame([5, 9, 3], $oddStrategy->filter());
    }
}
