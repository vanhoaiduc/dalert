<?php

namespace app\models;

use app\common\dictionaries\DueDictionary;
use app\common\helpers\NumberHelper;
use app\models\behaviors\DueUpdateExpiredAtBehavior;

/**
 * @property int|null $alerted
 */
trait DueAlertedStatusTrait{

	/**
	 * @return $this
	 */
	public function markAlerted()
	: self{
		$this->detachBehavior(DueUpdateExpiredAtBehavior::getName());
		$this->alerted        = $this->getNextAlertedStatus();
		$this->alerted_at     = time();
		$this->alerted_emails = $this->settingEmail->value ?? NULL;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getNextAlertedStatus()
	: int{
		if ($this->alerted === NULL){
			return DueDictionary::ALERTED_FIRST;
		}

		if (!$this->hasAlertedStatus(DueDictionary::ALERTED_SECOND)){
			return $this->alerted | DueDictionary::ALERTED_SECOND;
		}

		if (!$this->hasAlertedStatus(DueDictionary::ALERTED_THIRD)){
			return $this->alerted | DueDictionary::ALERTED_THIRD;
		}

		return $this->alerted;
	}

	/**
	 * @param $status_to_check
	 *
	 * @return bool
	 */
	private function hasAlertedStatus($status_to_check)
	: bool{
		return NumberHelper::isBitSet($this->alerted, $status_to_check);

	}
}