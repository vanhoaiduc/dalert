<?php

namespace app\common\bootstrap5;

use app\common\App;
use app\common\helpers\DateHelper;
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
		$init_val = $this->model->{$this->attribute};
		$value    = $init_val
			? App::getFormatter()->asDate($init_val)
			: DateHelper::currentDate('Y/m/d');

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