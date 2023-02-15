<?php

namespace app\common\grid;

use app\common\helpers\DateHelper;
use yii\grid\DataColumn;

/**
 *
 */
class ExpiredColumn extends DataColumn{

	public function init(){
		parent::init();
		$this->contentOptions = static function ($model, $key, $index, $grid){
			/** @var \app\models\Due $model */
			if ($model->alerted){
				return ['class' => 'text-danger'];
			}

			return [];
		};
	}

	/**
	 * {@inheritdoc}
	 */
	protected function renderDataCellContent($model, $key, $index){
		$value = parent::renderDataCellContent($model, $key, $index);

		return DateHelper::asDate($value);
	}
}