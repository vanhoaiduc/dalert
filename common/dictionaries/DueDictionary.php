<?php

namespace app\common\dictionaries;

/**
 *
 */
class DueDictionary{

	public const TYPE_DOMAIN = 1;

	public const TYPE_SSL = 2;

	/**
	 * @return array
	 */
	public static function getList()
	: array{
		return [
			self::TYPE_DOMAIN => 'Domain',
			self::TYPE_SSL    => 'SSL',
		];
	}

	/**
	 * @return int[]
	 */
	public static function getListIds()
	: array{
		return array_keys(self::getList());
	}
}