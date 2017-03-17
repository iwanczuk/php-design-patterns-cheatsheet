<?php

namespace PhpDesignPatternsCheatsheet\Tests\Creational\Singleton;

use PhpDesignPatternsCheatsheet\Creational\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testInheritance()
    {
        $reflection = new \ReflectionClass(Singleton::class);

        $this->assertTrue($reflection->isFinal());
    }

    public function testIsNonUnserializable()
    {
        $instance = Singleton::getInstance();

        $this->expectException(\LogicException::class);

        unserialize(serialize($instance));
    }

    public function testIsNonInstantiable()
    {
        $reflection = new \ReflectionClass(Singleton::class);

        $this->assertFalse($reflection->isInstantiable());
    }

    public function testIsNonCloneable()
    {
        $reflection = new \ReflectionClass(Singleton::class);

        $this->assertFalse($reflection->isCloneable());
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Singleton::class, Singleton::getInstance());
        $this->assertSame(Singleton::getInstance(), Singleton::getInstance());
    }
}
