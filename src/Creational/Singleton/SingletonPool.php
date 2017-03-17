<?php

namespace PhpDesignPatternsCheatsheet\Creational\Singleton;

abstract class SingletonPool
{
    /**
     * @var self[]
     */
    private static $instances;

    /**
     * Provides a way to access singleton instance.
     *
     * @return self
     */
    public final static function getInstance(): self
    {
        if (!isset(self::$instances[static::class])) {
            self::$instances[static::class] = new static();
        }

        return self::$instances[static::class];
    }

    /**
     * Prevent unserialization of singleton object from outside.
     * PHP issues a warning if private or protected is used with __wakeup.
     */
    public final function __wakeup()
    {
        throw new \LogicException('Singleton cannot be unserialized.');
    }

    /**
     * Prevent creating singleton object from outside.
     */
    private final function __construct()
    {
    }

    /**
     * Prevent cloning singleton object from outside.
     */
    private final function __clone()
    {
    }
}
