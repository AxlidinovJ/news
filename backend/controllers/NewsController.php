<?php

namespace backend\controllers;

use common\models\News;
use yii\base\Security;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile as WebUploadedFile;
use kartik\mpdf\Pdf;
use app\models\NewsSearch;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public $layout = "adminlte";
  

    /**
     * Lists all News models.
     *
     * @return string
     */
    // public function actionIndex()
    // {
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => News::find(),
    //         /*
    //         'pagination' => [
    //             'pageSize' => 50
    //         ],
    //         */

    //         'sort' => [
    //             'defaultOrder' => [
    //                 'id' => SORT_DESC,
    //             ]
    //         ],
    //     ]);
    //     \yii::$app->session->set('menu','news');
    //     return $this->render('index', [
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        \yii::$app->session->set('menu','news');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new News();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $rasm = WebUploadedFile::getInstance($model,'img');
                $random = new Security();
                if($rasm){
                    $nomi = $random->generateRandomString(32).".".$rasm->extension;
                    $rasm->saveAs("photos/newsimg/".$nomi);
                     $model->img = $nomi;
                     $model->time = date("Y-m-d H:i:s");
                }else{
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                $model->author = \yii::$app->user->identity->id;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $nomi = $model->img;
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $rasm = WebUploadedFile::getInstance($model,'img');
                $random = new Security();
                if($rasm){
                    unlink("photos/newsimg/".$nomi);
                    $nomi = $random->generateRandomString(32).".".$rasm->extension;
                    $rasm->saveAs("photos/newsimg/".$nomi);
                }
                $model->img = $nomi;
                $model->time = date("Y-m-d H:i:s");
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);

}

    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        if($model->img!=="no-img.png" and file_exists("photos/newsimg/".$model->img)){
            unlink("photos/newsimg/".$model->img);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionPrint($id) {
        $model = News::findOne($id);
        $content = $this->renderPartial('exportpdf',['model'=>$model]);
        
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, 
            'format' => Pdf::FORMAT_A4, 
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            'destination' => Pdf::DEST_BROWSER, 
            'content' => $content,  
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}', 
            'options' => ['title' => 'Jamshidbek Axlidinov'],
            'methods' => [ 
                'SetHeader'=>['Jamshidbek Axlidinov'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        return $pdf->render(); 
    }

}
