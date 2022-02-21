<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Create News';
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="news-create">

            <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div>
    </div>
</div>