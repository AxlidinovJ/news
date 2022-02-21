<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Update News: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="card card-primary card-outline">
    <div class="card-body box-profile">
<div class="news-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div></div>