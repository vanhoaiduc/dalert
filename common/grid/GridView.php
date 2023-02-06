<?php

namespace app\common\grid;

/**
 * @property array $timestamp_column
 */
class GridView extends \yii\grid\GridView{

	public array $timestamp_columns = ['created_at', 'updated_at'];

	/**
	 * @inheritDoc
	 * Auto format timestamp columns
	 */
	protected function initColumns(){
		$this->formatTimestampColumns();
		parent::initColumns();
	}

	/**
	 * Format to Y/MM/dd and color if due date
	 */
	private function formatTimestampColumns()
	: void{
		foreach ($this->columns as $index => $column){
			if (!in_array($column, $this->timestamp_columns)){
				continue;
			}

			$this->columns[$index] = [
				'attribute' => $column,
				'value'     => function ($model, $key, $index, $column){
					$value = $model->{$column->attribute};

					return $this->formatter->format($value, ['date', 'Y/MM/dd']);
				},
				'format'    => 'html',
			];
		}
	}
}