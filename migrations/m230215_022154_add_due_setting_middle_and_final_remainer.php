<?php

use app\common\dictionaries\SettingDictionary;
use app\models\Setting;
use yii\db\Migration;
use yii\helpers\Console;
use yii\helpers\Json;

/**
 * Class m230215_022154_add_due_setting_middle_and_final_remainer
 */
class m230215_022154_add_due_setting_middle_and_final_remainer extends Migration{

	public array $settings = [
		SettingDictionary::EXPIRED_REMAINER_DAY_FIRST  => 30,
		SettingDictionary::EXPIRED_REMAINER_DAY_SECOND => 7,
		SettingDictionary::EXPIRED_REMAINER_DAY_THIRD  => 1,
	];

	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$succes = TRUE;
		foreach ($this->settings as $key => $value){
			$model        = new Setting();
			$model->key   = $key;
			$model->value = (string) $value;
			if (!$model->save()){
				Console::output(Json::encode($model->getFirstErrors()));
				$succes = FALSE;
				break;
			}
		}

		return $succes;
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		Setting::deleteAll(['key' => array_keys($this->settings)]);

		return TRUE;
	}
}
