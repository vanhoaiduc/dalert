<?php

namespace app\models\behaviors;


use app\common\Behavior;
use app\common\db\ActiveRecord;
use app\common\dictionaries\DueDictionary;

/**
 * @property-read \app\models\Due $owner
 */
class DueUpdateExpiredAtBehavior extends Behavior{

	public function events(){
		return [
			ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdateCleartAlertedStatus',
		];
	}

	/**
	 * @param $event
	 *
	 * @return void
	 */
	public function beforeUpdateCleartAlertedStatus($event){
		if (!$this->owner->isAttributeChanged('expired_at')){
			return;
		}

		$this->owner->alerted = DueDictionary::NOT_ALERT;
	}
}