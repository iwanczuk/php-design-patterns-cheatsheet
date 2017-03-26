<?php

namespace PhpDesignPatternsCheatsheet\Structural\Decorator;

class SequenceDecorator extends AbstractDecorator
{
    /**
     * @var int
     */
    private $number;

    /**
     * @param FormatterInterface $formatter
     * @param int $number
     */
    public function __construct(FormatterInterface $formatter, int $number)
    {
        parent::__construct($formatter);

        $this->number = $number;
    }

    /**
     * @inheritdoc
     */
    public function format(string $text): string
    {
        return '[' . $this->number . '] ' . parent::format($text);
    }
}
