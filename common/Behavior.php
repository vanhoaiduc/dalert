<?php

namespace app\common;

/**
 * @property-read \app\common\db\ActiveRecord $owner
 */
class Behavior extends \yii\base\Behavior{

	/**
	 * @param $behaviors
	 *
	 * @return void
	 */
	public static function register(&$behaviors)
	: void{
		$behaviors[self::getName()] = static::class;
	}

	/**
	 * @note Override for short name if required
	 * @return string
	 */
	public static function getName()
	: string{
		return static::class;
	}
}