<?php

namespace PhpDesignPatternsCheatsheet\Tests\Creational\Singleton;

use PhpDesignPatternsCheatsheet\Creational\Singleton\SingletonTrait;
use PHPUnit\Framework\TestCase;

class SingletonTraitTest extends TestCase
{
    public function testIsNonUnserializable()
    {
        $instance = SingletonTraitDummy::getInstance();

        $this->expectException(\LogicException::class);

        unserialize(serialize($instance));
    }

    public function testIsNonInstantiable()
    {
        $reflection = new \ReflectionClass(SingletonTraitDummy::class);

        $this->assertFalse($reflection->isInstantiable());
    }

    public function testIsNonCloneable()
    {
        $reflection = new \ReflectionClass(SingletonTraitDummy::class);

        $this->assertFalse($reflection->isCloneable());
    }

    public function testInstance()
    {
        $this->assertInstanceOf(SingletonTraitDummy::class, SingletonTraitDummy::getInstance());
        $this->assertSame(SingletonTraitDummy::getInstance(), SingletonTraitDummy::getInstance());
    }
}
