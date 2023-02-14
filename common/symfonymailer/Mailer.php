<?php

namespace app\common\symfonymailer;

/**
 * Custom mailer
 */
class Mailer extends \yii\symfonymailer\Mailer{

	/** @inheritDoc */
	public function init(){
		parent::init();
		$this->viewPath         = '@app/mail';
		$this->useFileTransport = TRUE;
	}
}