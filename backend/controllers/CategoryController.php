<?php

namespace backend\controllers;

use app\models\CategorySearch;
use common\models\Category;
use common\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
   public $layout = "adminlte";




    // public function actionIndex()
    // {
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => Category::find(),
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

    //     \yii::$app->session->set('menu','category');


    //     return $this->render('index', [
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionIndex()
    {
        \yii::$app->session->set('menu','category');
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($this->request->isPost) {
            $model->date = date('Y-m-d');
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

 
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $news = News::find()->where('category_id='.$model->id)->all();
        foreach ($news as $key) {
            $key->delete();
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
