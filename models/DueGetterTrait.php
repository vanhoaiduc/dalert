<?php

namespace app\models;

use app\common\dictionaries\DueDictionary;
use yii\db\ActiveQuery;

/**
 * @property-read \app\models\Setting $settingEmail
 */
trait DueGetterTrait{

	/**
	 * @return \yii\db\ActiveQuery
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function findExpired()
	: ActiveQuery{
		$query = self::find();
		$query->andWhere(['>', 'expired_at', Setting::getDueExpiredThreshold()]);
		$query->andWhere(['alerted' => DueDictionary::NOT_ALERT]);

		return $query;
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSettingEmail(){
		return $this->hasOne(Setting::class, ['id' => 'setting_email_id']);
	}
}