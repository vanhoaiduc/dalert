<?php

use app\models\Due;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\DueSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title                   = 'Dues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="due-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Create Due', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel'  => $searchModel,
		'columns'      => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'name',
			'type',
			'expired_at',
			'setting_email_id:email',
			[
				'class'      => ActionColumn::className(),
				'urlCreator' => function ($action, Due $model, $key, $index, $column){
					return Url::toRoute([$action, 'id' => $model->id]);
				}
			],
		],
	]); ?>


</div>
