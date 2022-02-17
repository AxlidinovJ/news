<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use console\models\News;
use console\models\Category;
use frontend\models\SendmailForm;

class NewsController extends Controller
{
    public $layout = 'news';
    public function actionIndex()
    {
        $news  = news::find()->all();
        yii::$app->session->set('xolat','index');
        return $this->render('index',['news'=>$news]);
    }
    public function actionAbout()
    {
        yii::$app->session->set('xolat','about');
        return $this->render('about');
    }
    public function actionContact()
    {
        yii::$app->session->set('xolat','contact');
        $message = new SendmailForm();
        // if($message->load(yii::$app->request->post())){
        //     echo "<pre>";
        //     print_r($message);
        //     echo "</pre>";
        // }
        return $this->render('contact',['message'=>$message]);
    }
    public function actionPricing()
    {
        yii::$app->session->set('xolat','pricing');
        return $this->render('pricing');
    }
    public function actionView($id)
    {
        yii::$app->session->set('xolat','view');
        $news  = News::findOne($id);
        return $this->render('view',['news'=>$news]);
    }
    
}