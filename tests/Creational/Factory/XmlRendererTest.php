<?php

namespace PhpDesignPatternsCheatsheet\Tests\Creational\Factory;

use PhpDesignPatternsCheatsheet\Creational\Factory\XmlRenderer;
use PHPUnit\Framework\TestCase;

class XmlRendererTest extends TestCase
{
    public function testRenderer()
    {
        $fixture = [
            'foo' => 'bar'
        ];

        $renderer = new XmlRenderer();

        $this->assertSame(
            '<?xml version="1.0"?>' . "\n" . '<document><foo>bar</foo></document>' . "\n",
            $renderer->render($fixture)
        );
    }
}
