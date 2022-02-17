<?php use yii\helpers\Url;
$user=\yii::$app->user->identity;
use yii\bootstrap4\Html;
?><section class="content-header">
    <h1>General Form Elements <small>Preview</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section><?php if (yii::$app->session->getFlash('yes')=="yes") {
    ?><div class="container-fluid">
    <div class="alert alert-success" role="alert">SIz istagandak boldi </div>
</div><?php
}
if(yii::$app->session->getFlash('yes')=="no") {
    ?><div class="container-fluid">
    <div class="alert alert-danger" role="alert">O'zgartirishda xatolik
    </div>
</div><?php
}?>
<section>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="box box-primary" style="background-color:aliceblue  ;">
            <div class="card">
        <center>
        <img class="card-img-top" src="<?=url::to("@web/profilimg/".$user->photo)?>" alt="Card image" style="width:100px">
        </center>
        </div>
        <center>
            <div class="box-body">
                <div class="form-group"><label>FIO:</label><label><?=$user->name?></label></div>
                <div class="form-group"><label>Username:</label><label><?=$user->username?></label></div>
                <div class="form-group"><label>Email:</label><label><?=$user->email?></label></div>
                <div class="form-group"><a href="<?=url::to(['profil/edit'])?>" class="btn btn-success">O'zgartirish</a>
                </div>
            </div>
            </center>
        </div>
    </div>
</section>
<section>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="box box-primary" style="background-color:aliceblue  ;">

        <?php 
        use yii\bootstrap4\ActiveForm;
        ?>

            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => '{label}{input}{hint}<span class="text-danger">{error}</span>',
                    ],
                ]);
                    ?>

                <div class="box-body">
                    <div class="form-group">
                        <?=$form->field($userPas,'pasword')->passwordInput()?>
                    </div>
                    <div class="form-group">
                        <?=$form->field($userPas,'newpasword1')->passwordInput()?>
                    </div>
                    <div class="form-group">
                        <?=$form->field($userPas,'newpasword2')->passwordInput()?>
                    </div>
                    <?=html::submitButton("Tasdiqlash",['class'=>'btn btn-success'])?>
                </div>


            <?php ActiveForm::end();?>

        </div>
    </div>
</section>