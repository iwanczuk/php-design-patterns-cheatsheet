<?php

namespace PhpDesignPatternsCheatsheet\Structural\Decorator;

abstract class AbstractDecorator implements FormatterInterface
{
    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @inheritdoc
     */
    public function format(string $text): string
    {
        return $this->formatter->format($text);
    }
}
