<?php

namespace app\common\grid;

use yii\grid\DataColumn;

/**
 *
 */
class ExpiredColumn extends DataColumn{

	public function init(){
		parent::init();

		$this->contentOptions = static function ($model, $key, $index, $grid){
			/** @var \app\models\Due $model */
			if ($model->hasThirdAlert()){
				return ['class' => 'text-danger'];
			}

			if ($model->hasSecondAlert()){
				return ['class' => 'text-warning'];
			}

			if ($model->hasFirstAlert()){
				return ['class' => 'text-info'];
			}

			return [];
		};
	}
}