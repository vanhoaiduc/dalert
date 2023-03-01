<?php

namespace app\common\helpers;

use app\common\App;

/**
 *
 */
class DateHelper{

	public const UNIX_DAY = 86400;

	/**
	 * @param null $format
	 *
	 * @return string
	 */
	public static function currentDate($format = NULL)
	: string{
		if ($format === NULL){
			$format = App::getFormatter()->dateFormat;
		}

		return date($format);
	}

	/**
	 * @param $time
	 *
	 * @return string|null
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function asDate($time)
	: ?string{
		return App::getFormatter()->asDate($time);
	}
}