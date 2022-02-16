<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;

class NewsController extends Controller
{
    public $layout = 'news';
    public function actionIndex()
    {
        return $this->render('index');
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
    public function actionView()
    {
        return $this->render('view');
    }
}