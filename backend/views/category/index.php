<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Category;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Alert;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
// $this->params['text'] = '<a href="">tr</a>';
?>



<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="category-index">

            <p>
                <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>', ['create'], ['class' => 'btn btn-success']) ?>
            </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'catagory_name',
            'date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>"{view} {update} {delete}",
                'buttons'=>[
                    'delete'=>function($url,$data){
                        return html::a('<i class="fa fa-trash"></i>',$url, [
                            'data'=>[
                                'confirm' => "TEst"
                            ]
                        ]);
                    }
                ]   

             ],
        ],
    ]); ?>


        </div>
    </div>
</div>