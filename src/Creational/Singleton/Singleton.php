<?php

namespace PhpDesignPatternsCheatsheet\Creational\Singleton;

final class Singleton
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
    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Prevent unserialization of singleton object from outside.
     * PHP issues a warning if private or protected is used with __wakeup.
     */
    public function __wakeup()
    {
        throw new \LogicException('Singleton cannot be unserialized.');
    }

    /**
     * Prevent creating singleton object from outside.
     */
    private function __construct()
    {
    }

    /**
     * Prevent cloning singleton object from outside.
     */
    private function __clone()
    {
    }
}
