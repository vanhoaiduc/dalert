<?php

/** @var yii\web\View $this */

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var bool $enable_action */

$this->title = 'Dashboard';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Dashboard!</h1>

        <p class="lead"></p>

    </div>

    <div class="body-content">
		<?= $this->render('/_shared/due_grid', compact(['dataProvider', 'enable_action'])) ?>
    </div>
</div>
