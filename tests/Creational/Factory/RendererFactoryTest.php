<?php

namespace PhpDesignPatternsCheatsheet\Tests\Creational\Factory;

use PhpDesignPatternsCheatsheet\Creational\Factory\RendererFactory;
use PhpDesignPatternsCheatsheet\Creational\Factory\JsonRenderer;
use PhpDesignPatternsCheatsheet\Creational\Factory\XmlRenderer;
use PHPUnit\Framework\TestCase;

class RendererFactoryTest extends TestCase
{
    public function testRenderer()
    {
        $factory = new RendererFactory();

        $this->assertInstanceOf(JsonRenderer::class, $factory->create(RendererFactory::JSON));
        $this->assertInstanceOf(XmlRenderer::class, $factory->create(RendererFactory::XML));
    }

    public function testNonRenderer()
    {
        $factory = new RendererFactory();

        $this->expectException(\InvalidArgumentException::class);

        $factory->create('');
    }
}
