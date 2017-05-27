<?php

namespace PhpDesignPatternsCheatsheet\Tests\Behavioral\Visitor;

use PhpDesignPatternsCheatsheet\Behavioral\Visitor\PrintVisitor;
use PhpDesignPatternsCheatsheet\Behavioral\Visitor\OperandNode;
use PhpDesignPatternsCheatsheet\Behavioral\Visitor\OperatorNode;
use PHPUnit\Framework\TestCase;

class PrintVisitorTest extends TestCase
{
    public function testGetOutput()
    {
        $visitor = $this->getMockBuilder(PrintVisitor::class)
            ->setMethods()
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame('', $visitor->getOutput());

        $operand = $this->createMock(OperandNode::class);
        $operand->expects($this->once())
            ->method('getValue')
            ->willReturn(1.0);

        $visitor->visitOperandNode($operand);

        $this->assertSame('1', $visitor->getOutput());

        $operand = $this->createMock(OperandNode::class);
        $operand->expects($this->once())
            ->method('getValue')
            ->willReturn(2.0);

        $visitor->visitOperandNode($operand);

        $this->assertSame('1 2', $visitor->getOutput());

        $operator = $this->createMock(OperatorNode::class);
        $operator->expects($this->once())
            ->method('getSymbol')
            ->willReturn(OperatorNode::SYMBOL_PLUS);

        $visitor->visitOperatorNode($operator);

        $this->assertSame('1 2 +', $visitor->getOutput());

        $operator = $this->createMock(OperatorNode::class);
        $operator->expects($this->once())
            ->method('getSymbol')
            ->willReturn(OperatorNode::SYMBOL_MINUS);

        $visitor->visitOperatorNode($operator);

        $this->assertSame('1 2 + -', $visitor->getOutput());
    }
}
