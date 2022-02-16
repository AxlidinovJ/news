<?php
use yii\helpers\Url;
?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2><?=$news->title?></h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<p>
					<img src="<?=url::to("../../../../backend/web/newsimg/".$news->img)?>" alt="<?=$news->title?>" class="img-rounded img-responsive"></p>

					<p>
						<?php
							$data = $news->content;
							echo str_replace("\n","</p><p>",$data);
						?>
					</p>
				</div>
        	</div>

