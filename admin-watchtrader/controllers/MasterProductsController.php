<?php

namespace app\controllers;

use Yii;
use app\models\MasterItems;
use app\models\MasterProductImage;
use app\models\MasterItemsSearch;
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
        $searchModel = new MasterItemsSearch();
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
        $model = MasterItems::findOne($id);
        $modelImage = MasterProductImage::find()->where(['item_id'=>$id])->all();
        return $this->render('view', [
            'model' => $model,
            'modelImage' => $modelImage
        ]);
    }
    public function actionAddImage($id)
    {
        $model = MasterItems::findOne($id);
        $modelImage = new MasterProductImage();
        $post = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {
            $modelImage->image = UploadedFile::getInstances($modelImage, 'image');
            foreach ($modelImage->image as $image) {
                $image->saveAs('../../data/products/' . $image->baseName . '.' . $image->extension);
                $new = new MasterProductImage();
                $new->item_id = $id;
                $new->image = $image->baseName . '.' . $image->extension;
                $new->save();
            }
           
            return $this->redirect(['view?id='.$id]);
          
        }
       
        return $this->render('add-image', [
            'model' => $modelImage,
        ]);
    }
    public function actionViewImage($id)
    {
        $model = MasterProductImage::find()->where(['item_id'=>$id])->all();
        $modelId = $id;
        return $this->render('view-image', [
            'model' => $model,
            'modelid' => $modelId
        ]);
    }
    public function actionUpdateImage($id)
    {
        $model = MasterProductImage::findOne($id);
        $img_lama = $model->image;

        if (Yii::$app->request->post()) {
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
                return $this->redirect(['view-image?id='.$model->item->id]);
            }
        } 
        return $this->render('update-image', [
            'model' => $model,
        ]);
    }
    public function actionDeleteImage($id)
    {
        $model = MasterProductImage::findOne($id);
        $model->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }
    /**
     * Creates a new MasterJenisAkta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterItems();

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
        if (($model = MasterItems::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
