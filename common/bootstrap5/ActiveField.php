<?php

namespace app\common\bootstrap5;

use app\common\App;
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
		$value = App::getFormatter()->asDate($this->model->{$this->attribute});

		return $this->widget(DatePicker::class, [
			'type'          => DatePicker::TYPE_INPUT,
			'options'       => [
				'value'       => $value,
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