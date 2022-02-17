<?php

namespace backend\controllers;

use backend\models\User;
use backend\models\Pasword;
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
        $id = yii::$app->user->identity->id;
        $userPas =  new Pasword();
        $model = User::findOne($id);
        
        if($userPas->load(yii::$app->request->post())){
           if(yii::$app->getSecurity()->validatePassword($userPas->pasword, $model->password_hash)){
                $model->password_hash = yii::$app->getSecurity()->generatePasswordHash($userPas->newpasword2);
                $model->save();
                yii::$app->session->setFlash('yes','yes');
                return $this->redirect(['index']);
           }else{
            yii::$app->session->setFlash('yes','no');
            return $this->redirect(['index']);
           }

        }

        return $this->render('index',['userPas'=>$userPas]);
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
            yii::$app->session->setFlash('yes','yes');
            return $this->redirect(['profil/index']);
        }
        return $this->render('edit',['user'=>$user]);
    }
    public function actionLogout()
    {
        yii::$app->user->logout();
        return $this->redirect(url::to(['../../../frontend/web/']));
    }

}
