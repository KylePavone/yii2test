<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserModel $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-model-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true])->label("Password") ?>

    <?= $form->field($model, 'passwordRepeat')->passwordInput(['maxlength' => true])->label("Confirm Password") ?>
    <?= $form->field($model, 'date_reg')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>