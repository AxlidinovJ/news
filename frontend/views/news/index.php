<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="row">
    <div id="fh5co-board" data-columns>

       <?php foreach ($news as $new) {?>
        <div class="item">
            <div class="animate-box">
                <a href="<?=url::to(['news/view','id'=>$new->id])?>" class="fh5co-board-img" title="">
                    <img src="<?=url::to(["../../../backend/web/photos/newsimg/".$new->img])?>" alt="<?=$new->title?>">
                </a>
            </div>
            <div class="fh5co-desc"><?=$new->title?></div>
        </div>
        <?php } ?>
    </div>
</div>
<center>
<?php
     echo LinkPager::widget([
         'pagination'=>$pages,
     ]);
     ?>
</center>