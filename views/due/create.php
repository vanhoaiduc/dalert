<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Due $model */

$this->title                   = 'Create Due';
$this->params['breadcrumbs'][] = ['label' => 'Dues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="due-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
