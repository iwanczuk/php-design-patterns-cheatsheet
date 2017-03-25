<?php

namespace PhpDesignPatternsCheatsheet\Tests\Structural\Decorator;

use PhpDesignPatternsCheatsheet\Structural\Decorator\FormatterInterface;
use PhpDesignPatternsCheatsheet\Structural\Decorator\SeverityDecorator;
use PHPUnit\Framework\TestCase;

class SeverityDecoratorTest extends TestCase
{
    public function testFormat()
    {
        $fixture = 'test';

        $formatter = $this->createMock(FormatterInterface::class);
        $formatter->expects($this->once())
            ->method('format')
            ->willReturn($fixture);

        $severityDecorator = new SeverityDecorator($formatter, SeverityDecorator::INFO);

        $this->assertEquals(SeverityDecorator::INFO . ': ' . $fixture, $severityDecorator->format($fixture));
    }
}
