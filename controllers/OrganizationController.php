<?php

namespace app\controllers;

use app\models\Job;
use app\models\OrganizationAddress;
use app\models\OrganizationWork;
use Yii;
use app\models\Organization;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class OrganizationController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'index', 'update', 'delete', 'view', 'profile'],
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'profile'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
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
        $model = new Organization();    // This is used to search/filter organizations

        $dataProvider = null;
        if(isset($_GET['user_id']))
        {
            $user_id = $_GET['user_id'];
            if($user_id !== null)
            {
                $query = new Query();
                $query->from(Organization::tableName());
                $query->where(['user_id'=>$user_id]);
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 5,
                    ],
                ]);
            }
        }
        else if((isset($_GET['search_keyword']) && $_GET['search_keyword'] !== null && strlen($_GET['search_keyword'])>0) || (isset($_GET['search_location']) && $_GET['search_location'] !== null && strlen($_GET['search_location'])>0))
        {
            $search_keyword = $_GET['search_keyword'];
            if($search_keyword !== null)
            {
                $query = new Query();
                $query->from(Organization::tableName());
                $query->where(['name'=>$search_keyword]);
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 5,
                    ],
                ]);
            }
        }
        else
        {
            $dataProvider = new ActiveDataProvider([
                'query' => Organization::find(),
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);
        }

        if($model->load(Yii::$app->request->post()))
        {
            $query = new Query();
            $query->from(Organization::tableName());
            if(!is_null($model->org_type) && is_array($model->org_type))
                $query->where(['org_type' => array_map('intval', $model->org_type)]);
            if(!is_null($model->work_domain) && is_array($model->work_domain))
                $query->andWhere(['work_domain' => array_map('intval', $model->work_domain)]);
            if(isset($_GET['user_id']))
                $query->andWhere(['user_id'=>$_GET['user_id']]);
            if((isset($_GET['search_keyword']) && $_GET['search_keyword'] !== null && strlen($_GET['search_keyword'])>0) || (isset($_GET['search_location']) && $_GET['search_location'] !== null && strlen($_GET['search_location'])>0))
                $query->andWhere(['name'=>$_GET['search_keyword']]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Organization model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $query = new Query();
        $query->from(OrganizationAddress::tableName());
        $query->where(['org_id'=>$id]);
        $addressDataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $jobDataProvider = new ActiveDataProvider([
            'query' => Job::find()->where(['org_id'=>$id]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('extended_view', [
            'model' => $this->findModel($id),
            'workModel' => OrganizationWork::find()->where(['org_id'=>$id])->one(),
            'addressDataProvider' => $addressDataProvider,
            'jobDataProvider' => $jobDataProvider
        ]);
    }

    /**
     * Creates a new Organization model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Organization();

        if (Yii::$app->request->isPost) {

            $filePath = null;

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if(!is_null($model->imageFile))
            {
                $filePath = 'uploads/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
                $model->imageFile->saveAs($filePath);
                $model->logo = $filePath;
            }

            if ($model->load(Yii::$app->request->post()) && $model->beforeSave() && $model->save()) {
                $workModel = new OrganizationWork();
                $workModel->org_id = $model->id;
                ($workModel->beforeSave(true) && $workModel->save());
                return $this->redirect(['profile', 'id' => $model->id]);
            }
            else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Organization model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->user->id === $model->user_id) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new NotFoundHttpException('Access Denied. You need to be owner to perform this operation.');
        }
    }

    /**
     * Deletes an existing Organization model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->id === $model->user_id) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            throw new NotFoundHttpException('Access Denied. You need to be owner to perform this operation.');
        }
    }

    /**
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionProfile($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->id === $model->user_id) {
            $model = $this->findModel($id);
            $workModel = OrganizationWork::find()->where(['org_id'=>$id])->one();
            if($workModel === null)
                $workModel = new OrganizationWork();
            $addressModel = new OrganizationAddress();

            $query = new Query();
            $query->from(OrganizationAddress::tableName());
            $query->where(['org_id'=>$id]);
            $addressDataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            if ($model->load(Yii::$app->request->post()) && $model->beforeSave() && $model->save()) { }
            if ($workModel->load(Yii::$app->request->post()) && $workModel->beforeSave(true) && $workModel->save()) { }
            if ($addressModel->load(Yii::$app->request->post()) && ($addressModel->org_id = $model->id) && $addressModel->beforeSave(true) && $addressModel->save()) {
                $addressModel = new OrganizationAddress();
            }

            return $this->render('profile', [
                'model' => $model,
                'workModel' => $workModel,
                'addressModel' => $addressModel,
                'addressDataProvider' => $addressDataProvider
            ]);
        } else {
            throw new NotFoundHttpException('Access Denied. You need to be owner to perform this operation.');
        }
    }
}
