<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use console\models\News;
use console\models\Category;


class NewsController extends Controller
{
    public $layout = 'news';
    public function actionIndex()
    {
        $news  = news::find()->all();
        return $this->render('index',['news'=>$news]);
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionContact()
    {
        return $this->render('contact');
    }
    public function actionPricing()
    {
        return $this->render('pricing');
    }
    public function actionView($id)
    {
        $news  = News::findOne($id);
        return $this->render('view',['news'=>$news]);
    }
}