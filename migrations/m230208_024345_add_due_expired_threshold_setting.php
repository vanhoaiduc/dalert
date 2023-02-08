<?php

use app\common\dictionaries\SettingDictionary;
use app\models\Setting;
use yii\db\Migration;

/**
 * Class m230208_024345_add_due_expired_threshold_setting
 */
class m230208_024345_add_due_expired_threshold_setting extends Migration{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$model        = new Setting();
		$model->key   = SettingDictionary::THRESHOLD_EXPIRED_DAY;
		$model->value = 28;

		return $model->save();
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		return Setting::deleteAll(['key' => SettingDictionary::THRESHOLD_EXPIRED_DAY]);
	}
}
