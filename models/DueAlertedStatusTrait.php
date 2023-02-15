<?php

namespace app\models;

use app\common\dictionaries\DueDictionary;
use app\common\helpers\NumberHelper;

/**
 * @property int|null $alerted
 */
trait DueAlertedStatusTrait{

	/**
	 * @return $this
	 */
	public function markAlerted()
	: self{
		$this->detachBehaviors();
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

		if (!$this->hasSecondAlert()){
			return $this->alerted | DueDictionary::ALERTED_SECOND;
		}

		if (!$this->hasThirdAlert()){
			return $this->alerted | DueDictionary::ALERTED_THIRD;
		}

		return $this->alerted;
	}

	/**
	 * @return bool
	 */
	public function hasFirstAlert(){
		return $this->hasAlertedStatus(DueDictionary::ALERTED_FIRST);
	}

	/**
	 * @return bool
	 */
	public function hasSecondAlert(){
		return $this->hasAlertedStatus(DueDictionary::ALERTED_SECOND);
	}

	/**
	 * @return bool
	 */
	public function hasThirdAlert(){
		return $this->hasAlertedStatus(DueDictionary::ALERTED_THIRD);
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