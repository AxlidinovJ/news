<?php

use yii\helpers\Url;
?>

<section class="content-header container-fluid col-lg-6">
    <table class="table table-bordered">
        <tr>
            <th>Rasm</th>
            <td><img src="<?=url::to("../../profilimg/".yii::$app->user->identity->photo)?>" width="300px"></td>
        </tr>
        <tr>
            <th>FIO</th>
            <td><?=yii::$app->user->identity->name?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=yii::$app->user->identity->email?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?=yii::$app->user->identity->username?></td>
        </tr>
        <tr>
            <th>Parol</th>
            <td><?=yii::$app->user->identity->password_hash?></td>
        </tr>
        <tr>
            <th colspan="2"><a href="<?=url::to(['profil/edit'])?>" class="btn btn-success">O'zgartirish</a>
            <a href="<?=url::to(['profil/logout'])?>" class="btn btn-danger">Chiqish</a></th>
        </tr>
    </table>
</section>