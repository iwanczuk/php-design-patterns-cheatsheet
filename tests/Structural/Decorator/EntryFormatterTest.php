<?php

namespace PhpDesignPatternsCheatsheet\Tests\Structural\Decorator;

use PhpDesignPatternsCheatsheet\Structural\Decorator\EntryFormatter;
use PHPUnit\Framework\TestCase;

class EntryFormatterTest extends TestCase
{
    public function testFormat()
    {
        $fixture = 'test';

        $entryFormatter = new EntryFormatter();
        $this->assertEquals($fixture, $entryFormatter->format($fixture));
    }
}
