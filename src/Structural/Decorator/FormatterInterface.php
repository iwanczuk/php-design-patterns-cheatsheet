<?php

namespace PhpDesignPatternsCheatsheet\Structural\Decorator;

interface FormatterInterface
{
    /**
     * @return string
     */
    public function format(string $text): string;
}
