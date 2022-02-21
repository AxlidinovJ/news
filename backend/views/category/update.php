<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Update Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="category-update">
            <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div>
    </div>
</div>