<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model console\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
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
                'format'=>'html',
                'attribute'=>'img',
                'value'=>function($data){
                    return html::img(url::to("@web/newsimg/".$data->img),['width'=>"300px"]);
                }
            ],
            // 'content:ntext',
            [
                'attribute'=>'content',
                'format'=>'html',
                'value'=>function($data){
                    $datas = $data->content;
                    return str_replace(["\n","<img src="],["</p><p>",'<img class="img-rounded img-responsive" src='],$datas);
                }
            ],
            'time',
        ],
    ]) ?>

</div>
