<?php

use common\models\News;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->catagory_name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$yangilik  = News::find()->where('category_id='.$model->id)->all();

?>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="category-view">

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                // 'method' => 'post',
            ],
        ]) ?>
            </p>

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'catagory_name',
            'date',
        ],
    ]) ?>

        </div>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <table class="table table-bordered">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Titile
                </th>
            </tr>
<?php foreach($yangilik as $n=>$yangi){?>
            <tr>
                <th>
                    <?=$n+1?>
                </th>
                <th>
                <?=html::a($yangi->title,Url::to(['news/view','id'=>$yangi->id]))?>
                </th>
            </tr>
<?php  } ?>

        </table>
    </div>
</div>