<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Mediator;

use PhpDesignPatternsCheatsheet\Behavioral\Mediator\Channel;
use PhpDesignPatternsCheatsheet\Behavioral\Mediator\Member;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    public function testSetValidName()
    {
        $fixture = 'member';

        $member = $this->getMockBuilder(Member::class)
            ->setMethodsExcept(['getName', 'setName'])
            ->disableOriginalConstructor()
            ->getMock();

        $reflection = new \ReflectionClass(Member::class);
        $method = $reflection->getMethod('setName');
        $method->setAccessible(true);

        $method->invokeArgs($member, [$fixture]);

        $this->assertSame($fixture, $member->getName());
    }

    public function testSetInvalidName()
    {
        $member = $this->getMockBuilder(Member::class)
            ->setMethodsExcept(['setName'])
            ->disableOriginalConstructor()
            ->getMock();

        $reflection = new \ReflectionClass(Member::class);
        $method = $reflection->getMethod('setName');
        $method->setAccessible(true);

        $this->expectException(\RuntimeException::class);

        $method->invokeArgs($member, ['']);
    }

    public function testSendMessage()
    {
        $fixture = 'message';

        $member = $this->getMockBuilder(Member::class)
            ->setMethodsExcept(['sendMessage'])
            ->disableOriginalConstructor()
            ->getMock();

        $channel = $this->createMock(Channel::class);
        $channel->expects($this->once())
            ->method('dispatchMessage')
            ->with($member, $fixture);

        $member->sendMessage($channel, $fixture);
    }
}
