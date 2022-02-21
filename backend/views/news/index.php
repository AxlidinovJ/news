<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\News;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="news-index">

            <p>
                <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>', ['create'], ['class' => 'btn btn-success']) ?>
            </p>


            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>"img",
                'format'=>'html',
                'value'=>function($data){
                    return html::img("@web/photos/newsimg/".$data->img,['width'=>'200px']);
                }
            ],
            // 'title',
            [   
                'format'=>'html',
                'attribute'=>'title',
                'value'=>function($data){
                    return html::a($data->title,url::to(['news/view','id'=>$data->id]));
                }
            ],
            // 'category_id',
           [
               'label'=>'Katagoriya',
               'attribute'=>'category_id',
               'value'=>function($data){
                   return $data->category->catagory_name;   
               }
           ],
            // 'content:ntext',
            //'time',
           [
               'attribute'=>'author',
               'format'=>'html',
               'label'=>'Author',
               'value'=>function($data){
                return $data->user1[0]->username;
               }
           ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>"{view} {update} {delete} {print}",
                'buttons'=>[
                    'delete'=>function($url,$data){
                        return html::a('<i class="fa fa-trash"></i>',$url);
                    },
                    'print'=>function($url,$data){
                        return html::a('<i class="fa fa-print"></i>',$url,['target'=>"_blank"]);
                    },
                ]   

             ],
        ],
    ]); ?>

        </div>
    </div>
</div>