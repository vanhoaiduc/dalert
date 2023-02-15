<?php

namespace app\common\helpers;

/**
 *
 */
class NumberHelper{

	/**
	 * @param $compare
	 * @param $with
	 *
	 * @return bool
	 */
	public static function isBitSet($compare, $with)
	: bool{
		return ($compare & $with) === $with;
	}
}