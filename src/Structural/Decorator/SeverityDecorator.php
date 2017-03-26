<?php

namespace PhpDesignPatternsCheatsheet\Structural\Decorator;

class SeverityDecorator extends AbstractDecorator
{
    const INFO = 'info';

    /**
     * @var string
     */
    private $level;

    /**
     * @param FormatterInterface $formatter
     * @param string $level
     */
    public function __construct(FormatterInterface $formatter, string $level)
    {
        parent::__construct($formatter);

        $this->level = $level;
    }

    /**
     * @inheritdoc
     */
    public function format(string $text): string
    {
        return $this->level . ': ' . parent::format($text);
    }
}
