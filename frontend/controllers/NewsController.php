<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\News;
use common\models\Category;
use frontend\models\SendmailForm;
use yii\data\Pagination;

class NewsController extends Controller
{
    public $layout = 'news';
    public function actionIndex()
    {
        $query  = news::find()->orderBy('id DESC');
        $pages = new Pagination([
            'defaultPageSize'=>12,
            'totalCount'=>$query->count(),
        ]);
        $news = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

        yii::$app->session->set('xolat','index');

        return $this->render('index',['news'=>$news,'pages'=>$pages]);
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