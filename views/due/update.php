<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Due $model */

$this->title                   = 'Update Due: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="due-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
