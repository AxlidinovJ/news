<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'Contact';
?>

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<?php $form = ActiveForm::begin(); ?>
					<h2>Contact</h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<?= $form->field($message, 'firt_name')->textInput(['required'=>'true',['autofocus' => true]]) ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<!-- <input name="last_name"  type="text" class="form-control" placeholder="Last Name"> -->
									<?= $form->field($message, 'last_name')->textInput(['autofocus' => true]) ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<!-- <input name="email"  type="email" class="form-control" placeholder="Email Address"> -->
									<?= $form->field($message, 'email')->textInput(['required'=>'true','type'=>'email'])?>
								</div>
								<div class="form-group">
									<?= $form->field($message, 'subject')->textInput(['required'=>'true']) ?>
								</div>
								<div class="form-group">
									<!-- <textarea name="subject" id="message" cols="30" class="form-control" rows="10"></textarea> -->
									<?= $form->field($message, 'body')->textarea(['rows'=>5,'required'=>'true']) ?>
								</div>
								<div class="form-group">
									<!-- <input type="submit" class="btn btn-primary" value="Send Message"> -->
									<?= html::submitButton('Send Message',['class'=>'btn btn-primary']) ?>
								</div>
							</div>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
        	</div>
    