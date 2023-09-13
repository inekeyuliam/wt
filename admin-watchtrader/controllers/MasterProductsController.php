<?php

namespace app\controllers;

use Yii;
use app\models\MasterProducts;
use app\models\MasterProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * MasterJenisAktaController implements the CRUD actions for MasterJenisAkta model.
 */
class MasterProductsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MasterJenisAkta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterJenisAkta model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MasterJenisAkta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterProducts();

        $post = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if ($model->validate()) {                
                $model->image->saveAs('../../data/products/' . $model->image->baseName . '.' . $model->image->extension);

                if($model->save()){
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterJenisAkta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img_lama = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            $img_baru = UploadedFile::getInstance($model, 'image');

            if(empty($img_baru)){
                $model->image = $img_lama;
            }else{
                $model->image = UploadedFile::getInstance($model, 'image');

                if(!empty($model->image)){
                    $model->image->saveAs('../../data/products/' . $model->image->baseName . '.' . $model->image->extension);
                }  
            }
            if($model->save()){
                return $this->redirect(['index']);
            }
        } 
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterJenisAkta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterJenisAkta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MasterJenisAkta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterProducts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
