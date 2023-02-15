<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DueSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var bool $enable_action */

$this->title                   = 'Dues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="due-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Create Due', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<?= $this->render('/_shared/due_grid',
		compact(['searchModel', 'dataProvider', 'enable_action'])) ?>


</div>
