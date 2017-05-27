<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Visitor;

use PhpDesignPatternsCheatsheet\Behavioral\Visitor\EvaluateVisitor;
use PhpDesignPatternsCheatsheet\Behavioral\Visitor\OperandNode;
use PhpDesignPatternsCheatsheet\Behavioral\Visitor\OperatorNode;
use PHPUnit\Framework\TestCase;

class EvaluateVisitorTest extends TestCase
{
    public function testConstruct()
    {
        $visitor = new EvaluateVisitor();

        $this->assertSame(0.0, $visitor->getValue());
    }

    public function testVisitOperandNode()
    {
        $fixture = 2.0;

        $visitor = $this->getMockBuilder(EvaluateVisitor::class)
            ->setMethods()
            ->disableOriginalConstructor()
            ->getMock();

        $operand = $this->createMock(OperandNode::class);
        $operand->expects($this->once())
            ->method('getValue')
            ->willReturn($fixture);

        $visitor->visitOperandNode($operand);

        $this->assertSame($fixture, $visitor->getValue());
    }

    public function testVisitOperatorNode()
    {
        $fixture = 2.0;

        $visitor = $this->getMockBuilder(EvaluateVisitor::class)
            ->setMethods()
            ->disableOriginalConstructor()
            ->getMock();

        $operand = $this->createMock(OperandNode::class);
        $operand->expects($this->exactly(2))
            ->method('getValue')
            ->willReturn($fixture);

        $visitor->visitOperandNode($operand);
        $visitor->visitOperandNode($operand);

        $operator = $this->createMock(OperatorNode::class);
        $operator->expects($this->once())
            ->method('getSymbol')
            ->willReturn(OperatorNode::SYMBOL_PLUS);

        $visitor->visitOperatorNode($operator);

        $this->assertSame($fixture + $fixture, $visitor->getValue());
    }
}
