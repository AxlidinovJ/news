<?php

namespace backend\controllers;

use backend\models\User;
use yii\base\Controller;
use yii\filters\AccessControl;

class UserController extends Controller
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
        $users = User::find()->all();
        return $this->render('index',[
            'users'=>$users,
        ]);
    }


}
