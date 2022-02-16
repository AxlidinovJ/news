<?php

namespace backend\controllers;

use backend\models\User;
use yii;
use yii\base\Security;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Url;
class ProfilController extends Controller
{
    public $layout  = 'adminlte';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [ 
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionEdit()
    {
        $user =  User::findOne(yii::$app->user->identity->id);
        $name = $user->photo?$user->photo:"no-img.jpg";
        if($user->load(yii::$app->request->post())){
            $rasm = UploadedFile::getInstance($user,'photo');
           if($rasm){
            $random =  new Security();
            $name = $random->generateRandomString(10).".".$rasm->extension;
            $rasm->saveAs("profilimg/".$name);
           }
            $user->photo = $name;
            $user->save();
            return $this->redirect(['profil/index']);
        }
        return $this->render('edit',['user'=>$user]);
    }
    public function actionLogout()
    {
        yii::$app->user->logout();
        return $this->redirect(url::to(['../../fortend/web']));
    }

}
