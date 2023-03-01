<?php

namespace app\common\i18n;

use app\common\App;

/**
 *
 */
class Formatter extends \yii\i18n\Formatter{

	/** @inheritDoc */
	public function init(){
		parent::init();

		$this->dateFormat = App::isConsole() ? 'Y/m/d' : 'Y/MM/dd';
	}
}