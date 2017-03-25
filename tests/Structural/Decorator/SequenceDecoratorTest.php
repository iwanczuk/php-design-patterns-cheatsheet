<?php

namespace PhpDesignPatternsCheatsheet\Tests\Structural\Decorator;

use PhpDesignPatternsCheatsheet\Structural\Decorator\FormatterInterface;
use PhpDesignPatternsCheatsheet\Structural\Decorator\SequenceDecorator;
use PHPUnit\Framework\TestCase;

class SequenceDecoratorTest extends TestCase
{
    public function testFormat()
    {
        $fixture = 'test';

        $formatter = $this->createMock(FormatterInterface::class);
        $formatter->expects($this->once())
            ->method('format')
            ->willReturn($fixture);

        $sequenceDecorator = new SequenceDecorator($formatter, 1);

        $this->assertEquals('[1] ' . $fixture, $sequenceDecorator->format($fixture));
    }
}
