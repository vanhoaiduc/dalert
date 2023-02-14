<?php

namespace app\common\helpers;

/**
 *
 */
class StringHelper extends \yii\helpers\StringHelper{

	/**
	 * @inheritDoc
	 *
	 * @param boolean $skipEmpty default TRUE instead FALSE
	 */
	public static function explode($string, $delimiter = ',', $trim = TRUE, $skipEmpty = TRUE){
		return parent::explode($string, $delimiter, $trim, $skipEmpty);
	}
}