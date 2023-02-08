<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 *
 */
trait DueGetterTrait{

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public static function findExpired()
	: ActiveQuery{
		$query = self::find();
		$query->andWhere(['<', 'expired_at',]);

		return $query;
	}

	public static function getExpiredThreshold(){

	}
}