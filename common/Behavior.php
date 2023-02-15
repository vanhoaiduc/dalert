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

	/**
	 * @param $attribute
	 *
	 * @return bool
	 */
	public function isAttributeChanged($attribute)
	: bool{
		$old_attribute     = $this->owner->getOldAttribute($attribute);
		$current_attribute = $this->owner->{$attribute};

		return $old_attribute != $current_attribute;
	}
}