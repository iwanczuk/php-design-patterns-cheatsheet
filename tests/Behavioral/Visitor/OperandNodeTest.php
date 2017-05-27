<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Visitor;

use PhpDesignPatternsCheatsheet\Behavioral\Visitor\OperandNode;
use PhpDesignPatternsCheatsheet\Behavioral\Visitor\VisitorInterface;
use PHPUnit\Framework\TestCase;

class OperandNodeTest extends TestCase
{
    public function testGetValue()
    {
        $fixture = 1.0;

        $node = new OperandNode($fixture);

        $this->assertEquals($fixture, $node->getValue());
    }

    public function testVisitOperandNode()
    {
        $node = $this->getMockBuilder(OperandNode::class)
            ->setMethodsExcept(['accept'])
            ->disableOriginalConstructor()
            ->getMock();

        $visitor = $this->createMock(VisitorInterface::class);
        $visitor->expects($this->once())
            ->method('visitOperandNode')
            ->with($node);

        $node->accept($visitor);
    }
}
