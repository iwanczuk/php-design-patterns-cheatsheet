<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Mediator;

class Member
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        if (empty($name)) {
            throw new \RuntimeException('Member name must be set.');
        }

        $this->name = $name;
    }

    /**
     * @param string $text
     */
    public function receiveMessage(string $text)
    {

    }

    /**
     * @param Channel $channel
     * @param string $text
     */
    public function sendMessage(Channel $channel, string $text)
    {
        $channel->dispatchMessage($this, $text);
    }
}
