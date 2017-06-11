<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\Mediator;

class Channel
{
    /**
     * @var Member[]
     */
    private $members = [];

    /**
     * @param Member $member
     */
    public function joinMember(Member $member)
    {
        if (isset($this->members[$member->getName()])) {
            throw new \RuntimeException('Member already joined');
        }

        $this->members[$member->getName()] = $member;
    }

    /**
     * @return Member[]
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    /**
     * @param Member $sender
     * @param string $text
     */
    public function dispatchMessage(Member $sender, string $text)
    {
        foreach ($this->getMembers() as $member) {
            if ($member !== $sender) {
                $member->receiveMessage($text);
            }
        }
    }
}
