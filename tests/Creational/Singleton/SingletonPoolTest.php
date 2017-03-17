<?php

namespace PhpDesignPatternsCheatsheet\Tests\Creational\Singleton;

use PhpDesignPatternsCheatsheet\Creational\Singleton\SingletonPool;
use PHPUnit\Framework\TestCase;

class SingletonPoolTest extends TestCase
{
    public function testInheritance()
    {
        $reflection = new \ReflectionClass(SingletonPool::class);

        $this->assertFalse($reflection->isFinal());
        $this->assertTrue($reflection->isAbstract());
    }

    public function testIsNonUnserializable()
    {
        $instance = SingletonPoolFooDummy::getInstance();

        $this->expectException(\LogicException::class);

        unserialize(serialize($instance));
    }

    public function testIsNonInstantiable()
    {
        $reflection = new \ReflectionClass(SingletonPoolFooDummy::class);

        $this->assertFalse($reflection->isInstantiable());
    }

    public function testIsNonCloneable()
    {
        $reflection = new \ReflectionClass(SingletonPoolFooDummy::class);

        $this->assertFalse($reflection->isCloneable());
    }

    public function testInstance()
    {
        $this->assertInstanceOf(SingletonPoolFooDummy::class, SingletonPoolFooDummy::getInstance());
        $this->assertSame(SingletonPoolFooDummy::getInstance(), SingletonPoolFooDummy::getInstance());

        $this->assertInstanceOf(SingletonPoolBarDummy::class, SingletonPoolBarDummy::getInstance());
        $this->assertSame(SingletonPoolBarDummy::getInstance(), SingletonPoolBarDummy::getInstance());
    }
}
