<?php

namespace php\math;

use php\lang\Number;

/**
 * Collection of math functions
 * 
 */
class Math {
	
	/**
	 * 
	 * @param Number $base
	 * @param Number $exponent
	 * @return Number
	 */
	public static function pow($base, $exponent) {
		return new Number(pow($base, $exponent));
	}
	
	public static function ceil($value) {
		return ceil($value);
	}
	
	public static function floor($value) {
		return floor($value);
	}

	public static function min($values) {
		return min(func_get_args());
	}

	public static function max($values) {
		return max(func_get_args());
	}
	
	// ..
}