<?php

namespace app\common\i18n;

/**
 *
 */
class Formatter extends \yii\i18n\Formatter{

	/** @inheritDoc */
	public function init(){
		parent::init();

		$this->dateFormat = 'Y/MM/dd';
	}
}