<?php

namespace app\common\bootstrap5;


/**
 * @method ActiveField field()
 */
class ActiveForm extends \yii\bootstrap5\ActiveForm{

	public $fieldClass = ActiveField::class;

}