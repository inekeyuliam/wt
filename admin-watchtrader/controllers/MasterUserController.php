<?php

namespace app\controllers;

use Yii;
use app\models\MasterUser;
use app\models\MasterUserSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

class MasterUserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new MasterUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
      
        $model = MasterUser::find()->where(['id'=>$id])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        $model = MasterUser::find()->where(['id'=>$id])->one();
        $model->flag = 0;
        $model->save(false);

        return $this->redirect(['index']);
    }
    public function actionUpdatePassword($id)
    {
      
      $model = MasterUser::find()->where(['id'=>$id])->one();
      $password_lama = $model->password; // backup the value first;
      $model->password = "";

      $post = Yii::$app->request->post();
      $user = Yii::$app->request->post('MasterUser');
      if ($post){
        $model->load($post);

          $password_baru = $model->password;
          if(strlen($password_baru) == 0){
              $model->password = $password_lama;
          } else{
            $pass = $password_baru;
            $model->password = sha1($pass);
          }
          if($model->save()){

            return $this->redirect(['index']);

          }
          else {
            echo "MODEL NOT SAVED, ";
            print_r($model->getErrors());
            exit;
          }
      }

      return $this->render('update-password', [
          'model' => $model,
      ]);
    }

    public function actionUpdate($id)
    {
      
      $model = MasterUser::find()->where(['id'=>$id])->one();
      $password_lama = $model->password; // backup the value first;
      $model->password = "";

      $post = Yii::$app->request->post();
      $user = Yii::$app->request->post('MasterUser');
      if ($post) {
          $model->load($post);
          $check = $model->load(Yii::$app->request->post());
          $password_baru = $model->password;
          // var_dump($password_baru); exit;
          if(strlen($password_baru) == 0){
              $model->password = $password_lama;
          } else{
            $pass = $password_baru;
            $model->password = sha1($pass);
              // $model->password = Yii::$app->getSecurity()->generatePasswordHash($password_baru);
          }
          if($model->save()){

            return $this->redirect(['index']);

          }
          else {
            echo "MODEL NOT SAVED, ";
            print_r($model->getErrors());
            exit;
          }
      }

      return $this->render('update', [
          'model' => $model,
      ]);
    }

    public function actionCreate()
    {
      
      $model = new MasterUser();
      

      if ($model->load(Yii::$app->request->post())) {
          // $id_position = $model->position;
          // $position = MasterPosition::findOne($id_position);
          // $model->job = $position->job;
          $pass = $model->password;
          $model->password = sha1($pass);

          $post = Yii::$app->request->post('MasterUser');
          if($model->save()){


            return $this->redirect(['index']);
          }
          else {
            echo "MODEL NOT SAVED, ";
            print_r($model->getErrors());
            exit;
          }
      }


      return $this->render('create', [
          'model' => $model,

      ]);
    }

}
