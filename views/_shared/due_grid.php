<?php
/** @var app\models\DueSearch $searchModel */

/** @var yii\data\ActiveDataProvider $dataProvider */

/** @var bool $enable_action */

use app\common\grid\ActionColumn;
use app\common\grid\ExpiredColumn;
use app\common\grid\GridView;
use app\models\Due;
use yii\helpers\Url;

$columns = [
	['class' => 'yii\grid\SerialColumn'],
	'name',
	'typeName',
	[
		'class'     => ExpiredColumn::class,
		'attribute' => 'expired_at',
	],
	'settingEmail.value',
];

if ($enable_action){
	$columns[] = [
		'class'      => ActionColumn::class,
		'urlCreator' => function ($action, Due $model, $key, $index, $column){
			return Url::toRoute([$action, 'id' => $model->id]);
		}
	];
}

echo GridView::widget([
	'dataProvider'      => $dataProvider,
	'filterModel'       => $searchModel ?? NULL,
	'timestamp_columns' => ['expired_at'],
	'columns'           => $columns
]);