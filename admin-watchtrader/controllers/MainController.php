<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Main;
use yii\data\Pagination;
use yii\web\UploadedFile;
class MainController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       
        $model = Main::find()->all();
       
        return $this->render('index', ['model'=>$model]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $model = new Main();

        if ($model->load(Yii::$app->request->post())) {
            
                if ($model->save()) {
                    
                    Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
                    return $this->redirect(['index']);

                } else {
                    // var_dump($model->errors);exit;
                    Yii::$app->session->setFlash('error', 'Data gagal disimpan');
                }
           
        } else {
            return $this->render('create', [
                'model' => $model, 'user'=>$user
            ]);
        }
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionDelete($id)
    {
        $model = Main::findOne($id);

        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
            $model->flag = 0; 

            if ($model->save(true, ['flag'])) {
                Yii::$app->session->setFlash('success', 'Data berhasil dihapus');

                return $this->redirect(['index']);
            }

    }

    public function actionEdit($id)
    {
        $model = Main::findOne($id);
        $video_lama = $model->video;

        if ($model->load(Yii::$app->request->post())) {            
            $video_baru = UploadedFile::getInstance($model, 'video');
            if(empty($video_baru)){
                $model->video = $video_lama;
            }else{
                $model->video = UploadedFile::getInstance($model, 'video');

                if(!empty($model->video)){
                    $model->video->saveAs('../../data/main/' . $model->video->baseName . '.' . $model->video->extension);
                }  
            }
        
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
                return $this->redirect(['index']);

            } else {
                Yii::$app->session->setFlash('error', 'Data gagal disimpan');
            }
        
        }  else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = Main::findOne($id);
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

   
}
