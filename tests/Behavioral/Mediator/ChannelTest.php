<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Mediator;

use PhpDesignPatternsCheatsheet\Behavioral\Mediator\Channel;
use PhpDesignPatternsCheatsheet\Behavioral\Mediator\Member;
use PHPUnit\Framework\TestCase;

class ChannelTest extends TestCase
{
    public function testJoinMember()
    {
        $fixture = 'member';

        $member = $this->createMock(Member::class);
        $member->expects($this->any())
            ->method('getName')
            ->willReturn($fixture);

        $channel = $this->getMockBuilder(Channel::class)
            ->setMethodsExcept(['joinMember', 'getMembers'])
            ->disableOriginalConstructor()
            ->getMock();

        $channel->joinMember($member);

        $this->assertSame([$fixture => $member], $channel->getMembers());
    }

    public function testJoinedMember()
    {
        $fixture = 'member';

        $member = $this->createMock(Member::class);
        $member->expects($this->any())
            ->method('getName')
            ->willReturn($fixture);

        $channel = $this->getMockBuilder(Channel::class)
            ->setMethodsExcept(['joinMember'])
            ->disableOriginalConstructor()
            ->getMock();

        $channel->joinMember($member);

        $this->expectException(\RuntimeException::class);

        $channel->joinMember($member);
    }

    public function testDispatchMessage()
    {
        $fixture = 'message';

        $channel = $this->getMockBuilder(Channel::class)
            ->setMethodsExcept(['dispatchMessage'])
            ->disableOriginalConstructor()
            ->getMock();

        $sender = $this->createMock(Member::class);
        $sender->expects($this->never())
            ->method('receiveMessage');

        $recipient = $this->createMock(Member::class);
        $recipient->expects($this->once())
            ->method('receiveMessage')
            ->with($fixture);

        $channel->expects($this->once())
            ->method('getMembers')
            ->willReturn([$recipient]);

        $channel->dispatchMessage($sender, $fixture);
    }
}
