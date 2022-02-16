<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'category_id',
            'img',
            'content:ntext',
            //'time',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>"{view}{update}{delete}",
                'buttons'=>[
                    'delete'=>function($url,$data){
                        return "<i clss='fa '></i>";
                    }
                ]   
             ],
        ],
    ]); ?>


</div>
