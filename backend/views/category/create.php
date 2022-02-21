<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Create Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="category-create">
            <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div>
    </div>
</div>