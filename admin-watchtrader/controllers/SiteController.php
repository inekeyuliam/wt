<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MasterUser;
use app\models\Project;
use app\models\Customer;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'as beforeRequest' => [  //if guest user access site so, redirect to login page.
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'actions' => ['login', 'forgot', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
        if (!Yii::$app->user->isGuest) {
        
          return $this->render('/site/index');
        }else{

            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionCustomerstepdetail($id)
    {

        $customer = Customer::findOne($id);
        $history_list = History::find()->where(['id_customer'=>$id])->orderBy(['created_at'=>SORT_DESC])->all();

        return $this->render('customer_step_detail', [
            'model' => $customer,
            'history_list' => $history_list,
        ]);

    }

    public function actionForgot()
    {
        $this->layout = 'main-login';
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        $model = new MasterUser();
        if ($model->load(Yii::$app->request->post())) {
            $data = MasterUser::find()->where(['username' => $_POST['MasterUser']['username']])->one();
            // print_r($data['id']);
            // die();
            $model = $this->findModel($data['id']);
            $string = Yii::$app->security->generateRandomString(5);
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($string);
            $model->save(false);

            return $this->redirect('login');
        }

        return $this->render('forgot', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    protected function findModel($id)
    {
        if (($model = MasterUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
