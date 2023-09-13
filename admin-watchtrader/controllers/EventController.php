<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Events;
use app\models\EventsSearch;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\CompanyLinks;
use yii\data\Pagination;
use yii\web\UploadedFile;
class EventController extends Controller
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
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post())) {
                $data = Yii::$app->request->post();
                $dateString = $data['Events']['publishdate']; // Your date string from the database

                $formattedDate = date("Y-m-d", strtotime($dateString));
                $model->publishdate = $formattedDate;

                if ($model->save()) {
                    
                    Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
                    return $this->redirect(['index']);

                } else {
                    var_dump($model->errors);exit;
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
        $model = Events::findOne($id);

        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
            if ($model->delete()) {
                Yii::$app->session->setFlash('success', 'Data berhasil dihapus');
                return $this->redirect(['index']);
            }

    }

    public function actionUpdate($id)
    {
        $model = Events::findOne($id);

        if ($model->load(Yii::$app->request->post())) {            
            $data = Yii::$app->request->post();
            $dateString = $data['Events']['publishdate']; // Your date string from the database

            $formattedDate = date("Y-m-d", strtotime($dateString));
            $model->publishdate = $formattedDate;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
                return $this->redirect(['index']);

            } else {

                Yii::$app->session->setFlash('error', 'Data gagal disimpan');
            }
        
        }  else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = Events::findOne($id);
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

   
}
