<?php

namespace app\common\dictionaries;

/**
 *
 */
class DueDictionary{

	public const TYPE_DOMAIN = 1;

	public const TYPE_SSL = 2;

	public const NOT_ALERT = NULL;

	public const ALERTED = 1;

	public const ALERTED_FIRST = 1;

	public const ALERTED_SECOND = 2;

	public const ALERTED_THIRD = 4;

	/**
	 * @return array
	 */
	public static function getTypeList()
	: array{
		return [
			self::TYPE_DOMAIN => 'Domain',
			self::TYPE_SSL    => 'SSL',
		];
	}

	/**
	 * @return int[]
	 */
	public static function getTypeListIds()
	: array{
		return array_keys(self::getTypeList());
	}

	/**
	 * @param $type_id
	 *
	 * @return string
	 */
	public static function getTypeName($type_id)
	: string{
		return self::getTypeList()[$type_id] ?? 'Unknown';
	}
}