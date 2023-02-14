<?php

namespace app\common;

use app\common\i18n\Formatter;
use app\common\symfonymailer\Mailer;
use Yii;
use yii\db\Connection;

/**
 *
 */
class App{

	/**
	 * @return \__Application|\yii\base\Application|\yii\console\Application|\yii\web\Application
	 */
	public static function get(){
		return Yii::$app;
	}

	/**
	 * @return \app\common\i18n\Formatter
	 */
	public static function getFormatter()
	: Formatter{
		return self::get()->getFormatter();
	}

	/**
	 * @return \yii\db\Connection
	 */
	public static function getDb()
	: Connection{
		return self::get()->getDb();
	}

	/**
	 * @return \app\common\symfonymailer\Mailer
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function getMailer()
	: Mailer{
		return self::get()->getMailer();
	}

}