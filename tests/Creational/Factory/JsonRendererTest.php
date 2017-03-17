<?php

namespace PhpDesignPatternsCheatsheet\Tests\Creational\Factory;

use PhpDesignPatternsCheatsheet\Creational\Factory\JsonRenderer;
use PHPUnit\Framework\TestCase;

class JsonRendererTest extends TestCase
{
    public function testRenderer()
    {
        $fixture = [
            'foo' => 'bar'
        ];

        $renderer = new JsonRenderer();

        $this->assertSame(json_encode($fixture), $renderer->render($fixture));
    }
}
