<?php

namespace PhpDesignPatternsCheatsheet\Creational\Singleton;

trait SingletonTrait
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * Provides a way to access singleton instance.
     *
     * @return self
     */
    public final static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Prevent unserialization of objects with SingletonTrait from outside.
     * PHP issues a warning if private or protected is used with __wakeup.
     */
    public final function __wakeup()
    {
        throw new \LogicException('Singleton cannot be unserialized.');
    }

    /**
     * Prevent creating of objects with SingletonTrait from outside.
     */
    private final function __construct()
    {
    }

    /**
     * Prevent cloning of objects with SingletonTrait from outside.
     */
    private final function __clone()
    {
    }
}
