<?php

namespace app\controllers;

use app\models\OrganizationAddress;
use app\models\OrganizationWork;
use app\models\UserAddress;
use app\models\UserEducation;
use app\models\UserProfile;
use app\models\UserWorkExperience;
use dektrium\user\models\User;
use Yii;
use app\models\Organization;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class ConnectMeUserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'profile'],
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['profile'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Organization models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => User::findOne(['id'=>$id]),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionProfile($id)
    {
        $model = $this->findModel($id);
        if($model === null)
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        else
        {
            if (Yii::$app->user->id === $model->id) {

                $profileModel = UserProfile::findOne(['user_id'=>Yii::$app->user->id]);
                if(is_null($profileModel))
                    $profileModel = new UserProfile();

                $workModel = new UserWorkExperience();
                $query = new Query();
                $query->from(UserWorkExperience::tableName());
                $query->where(['user_id'=>$id]);
                $userWorkDataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $educationModel = new UserEducation();
                $query = new Query();
                $query->from(UserEducation::tableName());
                $query->where(['user_id'=>$id]);
                $educationDataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $addressModel = new UserAddress();
                $query = new Query();
                $query->from(UserAddress::tableName());
                $query->where(['user_id'=>$id]);
                $addressDataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                if ($profileModel->load(Yii::$app->request->post()) && $profileModel->beforeSave(true) && $profileModel->save()) {
                }

                if ($workModel->load(Yii::$app->request->post()) && ($workModel->user_id = $model->id) && $workModel->beforeSave(true) && $workModel->save()) {
                    $workModel = new UserWorkExperience();
                }
                if ($educationModel->load(Yii::$app->request->post()) && ($educationModel->user_id = $model->id) && $educationModel->beforeSave(true) && $educationModel->save()) {
                    $educationModel = new UserEducation();
                }
                if ($addressModel->load(Yii::$app->request->post()) && ($addressModel->user_id = $model->id) && $addressModel->beforeSave(true) && $addressModel->save()) {
                    $addressModel = new UserAddress();
                }

                return $this->render('profile', [
                    'model' => $model,
                    'profileModel' => $profileModel,
                    'workModel' => $workModel,
                    'workDataProvider' => $userWorkDataProvider,
                    'educationModel' => $educationModel,
                    'educationDataProvider' => $educationDataProvider,
                    'addressModel' => $addressModel,
                    'addressDataProvider' => $addressDataProvider
                ]);
            } else {
                throw new NotFoundHttpException('Access Denied. You need to be owner to perform this operation.');
            }
        }
    }
}
