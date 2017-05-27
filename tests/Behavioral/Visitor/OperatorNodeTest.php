<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Visitor;

use PhpDesignPatternsCheatsheet\Behavioral\Visitor\AbstractNode;
use PhpDesignPatternsCheatsheet\Behavioral\Visitor\OperatorNode;
use PhpDesignPatternsCheatsheet\Behavioral\Visitor\VisitorInterface;
use PHPUnit\Framework\TestCase;

class OperatorNodeTest extends TestCase
{
    public function testConstruct()
    {
        $left = $this->createMock(AbstractNode::class);
        $right = $this->createMock(AbstractNode::class);

        $node = new OperatorNode(
            OperatorNode::SYMBOL_MINUS,
            $left,
            $right
        );

        $this->assertEquals(OperatorNode::SYMBOL_MINUS, $node->getSymbol());
        $this->assertSame($left, $node->getLeft());
        $this->assertSame($right, $node->getRight());
    }

    public function testAccept()
    {
        $node = $this->getMockBuilder(OperatorNode::class)
            ->setMethodsExcept(['accept'])
            ->disableOriginalConstructor()
            ->getMock();

        $visitor = $this->createMock(VisitorInterface::class);
        $visitor->expects($this->once())
            ->method('visitOperatorNode')
            ->with($node);

        $left = $this->createMock(AbstractNode::class);
        $left->expects($this->once())
            ->method('accept')
            ->with($visitor);

        $right = $this->createMock(AbstractNode::class);
        $right->expects($this->once())
            ->method('accept')
            ->with($visitor);

        $node->expects($this->once())
            ->method('getLeft')
            ->willReturn($left);

        $node->expects($this->once())
            ->method('getRight')
            ->willReturn($right);

        $node->accept($visitor);
    }
}
