<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'category_id',
            // 'img',
            [
                'attribute'=>"img",
                'format'=>'html',
                'value'=>function($data){
                    return html::img("@web/photos/newsimg/".$data->img,['width'=>'300px']);
                }
            ],
            // 'content:ntext',
            [
                'attribute'=>'content',
                'format'=>'html',
                'value'=>function($data){
                    $datas = $data->content;
                     $datas1 = str_replace(["\n","<img src="],["</p><p>",'<img  width=\'300px\' src='],$datas);
                     return  "<div class='row col-md-8 col-md-offset-2'>".$datas1."</div>";
                    }
            ],
            'time',
        ],
    ]) ?>

</div>
