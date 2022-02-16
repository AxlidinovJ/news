<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use console\models\Category;

use dosamigos\tinymce\TinyMce;


$data = ArrayHelper::map(Category::find()->All(),'id','catagory_name');

?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($data,['prompt'=>'Kategoriyani tanlang'])?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <?php
        echo $form->field($model, 'content')->widget(TinyMce::className(), [
            'options' => ['rows' => 20],
            'language' => 'ru',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);  ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
