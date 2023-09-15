<?php

namespace app\controllers;

use Yii;
use app\models\MasterCollections;
use app\models\MasterCollectionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * MasterJenisAktaController implements the CRUD actions for MasterJenisAkta model.
 */
class MasterCollectionsController extends Controller
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
        $searchModel = new MasterCollectionsSearch();
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
        $model = new MasterCollections();

        $post = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->image_banner = UploadedFile::getInstance($model, 'image_banner');

            if ($model->validate()) {                
                $model->image_banner->saveAs('../../data/collections/' . $model->image_banner->baseName . '.' . $model->image_banner->extension);

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
        $img_lama = $model->image_banner;

        if ($model->load(Yii::$app->request->post())) {
            $img_baru = UploadedFile::getInstance($model, 'image_banner');

            if(empty($img_baru)){
                $model->image_banner = $img_lama;
            }else{
                $model->image_banner = UploadedFile::getInstance($model, 'image_banner');

                if(!empty($model->image_banner)){
                    $model->image_banner->saveAs('../../data/collections/' . $model->image_banner->baseName . '.' . $model->image_banner->extension);
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
        if (($model = MasterCollections::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
