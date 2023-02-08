<?php

namespace app\common;

use app\common\i18n\Formatter;
use Yii;

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

}