<?php

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase {
    public function testAdd() {
        $calculator = new Calculator();
        $this->assertEquals(5, $calculator->add(2, 3));
        $this->assertEquals(0, $calculator->add(-2, 2));
    }

    public function testDivide() {
        $calculator = new Calculator();
        $this->assertEquals(5, $calculator->divide(10, 2));
        $this->assertEquals(2.5, $calculator->divide(5, 2));
    }

    public function testDivideByZero() {
        $this->expectException(InvalidArgumentException::class);
        $calculator = new Calculator();
        $calculator->divide(10, 0);
    }
}

