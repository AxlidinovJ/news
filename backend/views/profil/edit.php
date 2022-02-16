<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;


?>

<div class="news-form container">
    <h1>Profilni sozlash</h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'username')->textInput()?>
    <?= $form->field($user, 'email')->textInput()?>

    <?= $form->field($user, 'photo')->fileInput() ?>
    <?= $form->field($user, 'password_hash')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
