<?php

namespace PhpDesignPatternsCheatsheet\Structural\Decorator;

interface FormatterInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function format(string $text): string;
}
