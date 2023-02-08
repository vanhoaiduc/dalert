<?php

namespace app\common\helpers;

use app\common\App;

/**
 *
 */
class DateHelper{

	public const UNIX_DAY = 86400;

	/**
	 * @return int
	 */
	public static function currentDateTimestamp()
	: int{
		return strtotime(date(App::getFormatter()->dateFormat));
	}
}