<?php

namespace app\models;

/**
 *
 */
trait SettingGetterTrait{

	/**
	 * @param $key
	 *
	 * @return int
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function getTimeThreshold($key)
	: int{
		$num_day = self::find()
		               ->andWhere(['key' => $key])
		               ->select(['value'])
		               ->scalar();

		return strtotime("+$num_day days");
	}
}