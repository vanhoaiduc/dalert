<?php

namespace app\common\symfonymailer;

/**
 * Custom mailer
 */
class Mailer extends \yii\symfonymailer\Mailer{

	public $sender = [];

	/** @inheritDoc */
	public function compose($view = NULL, array $params = []){
		$mes = parent::compose($view, $params);
		$mes->setFrom($this->sender);

		return $mes;
	}
}