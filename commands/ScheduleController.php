<?php

namespace app\commands;

use app\common\App;
use app\common\controllers\ConsoleController;
use app\models\Due;

class ScheduleController extends ConsoleController{

	/**
	 * @param $limit
	 *
	 * @return void
	 * @throws \yii\base\InvalidConfigException
	 */
	public function actionNotiExpired($limit = 50){
		/** @var Due[] $dues */
		$dues = Due::findExpired()->limit($limit)->joinWith(['settingEmail'])->each();
		foreach ($dues as $due){
			$saved = $due->markAlerted()->save();
			if (!$saved){
				// TODO set log
				continue;
			}

			if (!$due->alerted_emails){
				continue;
			}

			App::getMailer()->compose('text')->setTo($due->getAlertedEmails());
		}
	}
}