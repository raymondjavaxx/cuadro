<?php

use \cuadro\Rect;

/**
* Test case for \cuadro\Rect
*
* @package tests
*/
class RectTest extends \PHPUnit_Framework_TestCase {

	public function testInset() {
		$rect = new Rect(0, 0, 10, 10);
		$rect->inset(1, 2);
		$this->assertEquals(1, $rect->x);
		$this->assertEquals(2, $rect->y);
		$this->assertEquals(8, $rect->w);
		$this->assertEquals(6, $rect->h);
	}

	public function testOffset() {
		$rect = new Rect(0, 0, 10, 10);
		$rect->offset(1, 1);
		$this->assertEquals(1, $rect->x);
		$this->assertEquals(1, $rect->y);
	}

	public function testPoint2() {
		$rect = new Rect(1, 2, 10, 10);
		$this->assertEquals(11, $rect->x2());
		$this->assertEquals(12, $rect->y2());
	}

	public function testArea() {
		$rect = new Rect(0, 0, 3, 6);
		$this->assertEquals(18, $rect->area());
	}

	public function testPerimeter() {
		$rect = new Rect(0, 0, 10, 20);
		$this->assertEquals(60, $rect->perimeter());
	}

	public function testIsSquare() {
		$rect = new Rect(0, 0, 10, 10);
		$this->assertTrue($rect->isSquare());

		$rect = new Rect(0, 0, 10, 20);
		$this->assertFalse($rect->isSquare());
	}

	public function testRectContainingRects() {
		$rect = Rect::rectContainingRects(array(
			new Rect(1, 1, 1, 1),
			new Rect(0, 0, 1, 1),
			new Rect(0, -1, 1, 1)
		));

		$this->assertEquals(0, $rect->x);
		$this->assertEquals(-1, $rect->y);
		$this->assertEquals(2, $rect->w);
		$this->assertEquals(3, $rect->h);
	}

	public function testToString() {
		$rect = new Rect(2, 4, 10, 20);
		$this->assertEquals("[<2, 4>, <10, 20>]", (string)$rect);
	}
}
