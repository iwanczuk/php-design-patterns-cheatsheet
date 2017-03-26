<?php

namespace PhpDesignPatternsCheatsheet\Structural\Decorator;

class EntryFormatter implements FormatterInterface
{
    /**
     * @inheritdoc
     */
    public function format(string $text): string
    {
        return $text;
    }
}
