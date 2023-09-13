<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models\CategorySearch;
use yii\data\Pagination;
use yii\web\UploadedFile;
class CategoryController extends Controller
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
       
        $searchModel = new CategorySearch();
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
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {                

                if ($model->save()) {
                    
                    Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
                    return $this->redirect(['index']);

                } else {
                    // var_dump($model->errors);exit;
                    Yii::$app->session->setFlash('error', 'Data gagal disimpan');
                }
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
        $model = Category::findOne($id);

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
        $model = Category::findOne($id);

        if ($model->load(Yii::$app->request->post())) {            
            
            
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
        $model = Category::findOne($id);
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

   
}
