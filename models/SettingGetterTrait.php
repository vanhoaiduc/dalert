<?php

namespace app\models;

use app\common\dictionaries\SettingDictionary;

/**
 *
 */
trait SettingGetterTrait{

	public static function getDueExpiredThreshold()
	: int{
		$num_day = self::find()
		               ->andWhere(['key' => SettingDictionary::THRESHOLD_EXPIRED_DAY])
		               ->select(['value'])
		               ->scalar();
		++ $num_day;

		return strtotime("+{$num_day} days");
	}
}