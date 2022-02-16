<?php
use yii\helpers\Url;
function ImgagesFind($datas){
    $explode = explode('<img src="',$datas);
    if(isset($explode[1])){
        $explode2 = explode('" />',$explode[1]);
        $images = $explode2[0];
        return $images;
    }else{
        return false;
    }
}
?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2><?=$news->title?></h2>
					<!-- <div class="fh5co-spacer fh5co-spacer-sm"></div> -->
						<?php
							$data = $news->content;
							echo str_replace(["\n","<img src="],["</p><p>",'<img class="img-rounded img-responsive" src='],$data);
						?>
					</p>
				</div>
        	</div>

