<?php

namespace app\common\bootstrap5;

use kartik\date\DatePicker;

/**
 *
 */
class ActiveField extends \yii\bootstrap5\ActiveField{

	/**
	 * @return \app\common\bootstrap5\ActiveField
	 * @throws \Exception
	 */
	public function datePicker(){
		return $this->widget(DatePicker::class, [
			'type'          => DatePicker::TYPE_INPUT,
			'options'       => [
				'placeholder' => 'Enter birth date ...',
			],
			'pluginOptions' => [
				'daysOfWeekHighlighted' => [0, 6],
				'weekStart'             => 1,
				'orientation'           => 'bottom',
				'autoclose'             => TRUE,
				'todayHighlight'        => TRUE,
				'format'                => 'yyyy/mm/dd'
			],
		]);
	}
}