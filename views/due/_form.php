<?php

use app\common\bootstrap5\ActiveForm;
use app\common\dictionaries\DueDictionary;
use app\models\EmailSetting;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Due $model */
/** @var \app\common\bootstrap5\ActiveForm $form */
?>

<div class="due-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

	<?= $form->field($model, 'type')
	         ->dropDownList(DueDictionary::getTypeList()) ?>

	<?= $form->field($model, 'expired_at')->datePicker() ?>

	<?= $form->field($model, 'setting_email_id')->dropDownList(EmailSetting::getList()) ?>

    <div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
