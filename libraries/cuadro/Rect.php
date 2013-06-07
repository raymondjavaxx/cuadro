<?php
/**
 * cuadro
 *
 * Copyright (C) 2013 Ramon Torres
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) 2013 Ramon Torres
 * @package cuadro
 * @license The MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace cuadro;

/**
 * Awesome rectangle class
 */
class Rect {

	public $x;
	public $y;
	public $w;
	public $h;

	/**
	 * Constructor
	 *
	 * @param numeric $x
	 * @param numeric $y
	 * @param numeric $w
	 * @param numeric $h
	 */
	public function __construct($x, $y, $w, $h) {
		$this->x = $x;
		$this->y = $y;
		$this->w = $w;
		$this->h = $h;
	}

	/**
	 * Applies inset
	 *
	 * @param numeric $dx
	 * @param numeric $dy (optional)
	 */
	public function inset($dx, $dy = false) {
		if ($dy === false) {
			$dy = $dx;
		}

		$this->x += $dx;
		$this->y += $dy;
		$this->w -= ($dx * 2);
		$this->h -= ($dy * 2);
	}

	/**
	 * Applies ofset
	 *
	 * @param numeric $dx
	 * @param numeric $dy
	 */
	public function offset($dx, $dy) {
		$this->x += $dx;
		$this->y += $dy;
	}

	/**
	 * Calculates and returns x2
	 *
	 * @return numeric
	 */
	public function x2() {
		return ($this->x + $this->w);
	}

	/**
	 * Calculates and returns y2
	 *
	 * @return numeric
	 */
	public function y2() {
		return ($this->y + $this->h);
	}

	/**
	 * Calculates the area of the rectangle
	 *
	 * @return numeric
	 */
	public function area() {
		return ($this->w * $this->h);
	}

	/**
	 * Calculates the perimeter
	 *
	 * @return numeric
	 */
	public function perimeter() {
		return (($this->w + $this->h) * 2);
	}

	/**
	 * Checks if the rectangle is a square
	 *
	 * @return boolean
	 */
	public function isSquare() {
		return ($this->w == $this->h);
	}

	/**
	 * Returns a rectangle that contains all given rectangles
	 *
	 * @param array $rects  Array of `Rect`
	 * @return Rect
	 */
	public static function rectContainingRects($rects) {
		$minX = 0;
		$minY = 0;
		$maxX = 0;
		$maxY = 0;

		foreach ($rects as $i => $rect) {
			if ($i == 0) {
				$minX = $rect->x;
				$minY = $rect->x;
				$maxX = $rect->x2();
				$maxY = $rect->y2();
			} else {
				$minX = min($minX, $rect->x);
				$minY = min($minY, $rect->y);
				$maxX = max($maxX, $rect->x2());
				$maxY = max($maxY, $rect->y2());
			}
		}

		return new static($minX, $minY, $maxX - $minX, $maxY - $minY);
	}

	/**
	 * Cast to string
	 *
	 * @return string
	 */
	public function __toString() {
		return "[<{$this->x}, {$this->y}>, <{$this->w}, {$this->h}>]";
	}
}
