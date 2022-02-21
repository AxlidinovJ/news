<?php

namespace backend\controllers;

use backend\models\User;
use backend\models\PaswordForm;
use common\models\Category;
use common\models\News;
use Yii;
use yii\base\Security;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;

class AdminController extends Controller
{

    public $layout = 'adminlte';


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        // 'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        yii::$app->session->set('menu','dashbord');

        $newsCount = News::find()->count();
        $categoryCount = Category::find()->count();

        return $this->render('index',['newsCount'=>$newsCount,'categoryCount'=>$categoryCount]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionUser()
    {
        yii::$app->session->set('menu','user');
        $id  =  Yii::$app->user->identity->id;
        $admin = User::findOne($id);
        $nomi = $admin->img ;
        if($admin->load(Yii::$app->request->post())){
            $rasm = UploadedFile::getInstance($admin,'img');
           if($rasm){
            unlink("photos/users/$nomi");
            $random = new Security();
            $nomi = $random->generateRandomString(10).".".$rasm->extension;
            $rasm->saveAs('photos/users/'.$nomi);
           }
            $admin->img = $nomi;
            $admin->save()?Yii::$app->session->setFlash('success','saqlandi'):Yii::$app->session->setFlash('error','error');
            return $this->refresh();
        }
        $parol = new PaswordForm();
        if($parol->load(yii::$app->request->post()) && Yii::$app->getSecurity()->validatePassword($parol->password0, $admin->password_hash)){
            $admin->password_hash = Yii::$app->getSecurity()->generatePasswordHash($parol->newpassword1);   
            $admin->save()?Yii::$app->session->setFlash('success','success'):Yii::$app->session->setFlash('error','Saqlashda xatolik');
            return $this->redirect(['admin/user']); 
        }elseif($parol->load(yii::$app->request->post()) && !Yii::$app->getSecurity()->validatePassword($parol->password0, $admin->password_hash)){
            Yii::$app->session->setFlash('error','Oldingi parol unday emas');
            return $this->redirect(['admin/user']); 
        }
        return $this->render('user',['admin'=>$admin,'parol'=>$parol]);
    }

}
