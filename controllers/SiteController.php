<?php

namespace app\controllers;

use app\models\Lookup;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\DynamicModel;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\Job;

class SiteController extends Controller
{
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

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Job::find(),
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);

        $model = new DynamicModel([
            'search_keyword', 'search_location', 'search_type'
        ]);
        $model->addRule('search_type', 'integer')
            ->addRule('search_location', 'string',['max'=>128])
            ->addRule('search_keyword', 'string',['max'=>128]);

        if($model->load(Yii::$app->request->post())){
            switch($model->search_type)
            {
                case Lookup::item_code('SearchType', 'Organizations'):
                    return $this->redirect(['organization/index', 'search_keyword'=>$model->search_keyword]);
                    break;
                case Lookup::item_code('SearchType', 'Opportunities'):
                    return $this->redirect(['job/index', 'search_keyword'=>$model->search_keyword]);
                    break;
                default:
                    throw new NotFoundHttpException('Your search:' . $model->search_keyword);
                    break;
            }

        }
        return $this->render('index', [
            'model'=>$model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
