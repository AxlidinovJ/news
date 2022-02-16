<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use console\models\Category;

$data = ArrayHelper::map(Category::find()->All(),'id','catagory_name');

?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($data,['prompt'=>'Kategoriyani tanlang'])?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
