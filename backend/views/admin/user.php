<?php
use yii\bootstrap4\Breadcrumbs;

use common\widgets\Alert;
use yii\bootstrap4\ActiveForm as Bootstrap4ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
// $admin = yii::$app->user->identity;
use yii\widgets\ActiveForm;

$this->title =  $admin->name;
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?=url::to('@web/photos/users/'.$admin->img)?>"
                alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?=$admin->name?></h3>

            <p class="text-muted text-center"><?=date('d-M Y, H:i:s',$admin->created_at)?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Name</b> <a class="float-right"><?=$admin->name?></a>
              </li>
              <li class="list-group-item">
                <b>User Name</b> <a class="float-right">@<?=$admin->username?></a>
              </li>
              <li class="list-group-item">
                <a href="<?=url::to(['admin/logout'])?>" class="btn btn-danger btn-block">Chiqish</a>
              </li>

            </ul>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Bio</a></li>
              <li class="nav-item"><a class="nav-link " href="#edit" data-toggle="tab">Taxrirlash</a></li>
              <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Parolni o'zgartirish</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">

              <!-- About Me Box -->
              <div class="card card-primary tab-pane active" id='activity'>
                <div class="card-header">
                  <h3 class="card-title">Men haqimda</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Education</strong>
                  <p class="text-muted"><?=$admin->education?></p>
                  <hr>
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                  <p class="text-muted"><?=$admin->location?></p>
                  <hr>
                  <strong><i class="far fa-envelope mr-1"></i>Email</strong>
                  <p class="text-primary"><?=$admin->email?></p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="tab-pane" id="edit">
                <?php $form = Bootstrap4ActiveForm::begin([
                        'class'=>"form-horizontal",
                        'fieldConfig' => [
                            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                            ],]); ?>

                <?=$form->field($admin,'name',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>

                <?=$form->field($admin,'username',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>

                <?=$form->field($admin,'education',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>

                <?=$form->field($admin,'location',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>

                <?=$form->field($admin,'email',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>

                <?=$form->field($admin,'img',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->fileInput()?>

                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <?=Html::submitButton('Saqlash',['class'=>'btn btn-danger swalDefaultSuccess'])?>
                  </div>
                </div>
                <?php Bootstrap4ActiveForm::end()?>
              </div>

              <div class="tab-pane" id="settings">
                <?php $form2 = Bootstrap4ActiveForm::begin([
                        'class'=>"form-horizontal",
                        'fieldConfig' => [
                            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                            ],]); ?>

                <?=$form2->field($parol,'password0',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->passwordInput()?>

                <?=$form2->field($parol,'newpassword1',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->passwordInput()?>

                <?=$form2->field($parol,'newpassword2',['template'=>"<div class='form-group row'>\n<div class='col-sm-2 col-form-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10'>{input}</div>\n{error}\n{hint}\n</div>"])->passwordInput()?>

                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <?=Html::submitButton('Saqlash',['class'=>'btn btn-primary'])?>
                  </div>
                </div>
                <?php Bootstrap4ActiveForm::end()?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>