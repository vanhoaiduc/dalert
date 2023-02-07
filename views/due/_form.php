<?php

use app\common\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Due $model */
/** @var \app\common\bootstrap5\ActiveForm $form */
?>

<div class="due-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

	<?= $form->field($model, 'type')->textInput() ?>

	<?= $form->field($model, 'expired_at')->datePicker() ?>

	<?= $form->field($model, 'setting_email_id')->textInput() ?>

    <div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
