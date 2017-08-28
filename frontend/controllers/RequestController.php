<?php

namespace frontend\controllers;

use abhimanyu\sms\components\Sms;
use common\models\ListOfSupply;
use common\models\Supply;
use common\models\User;
use common\models\Vehicle;
use Yii;
use common\models\Request;
use common\models\RequestSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'logout', 'index', 'create', 'updatereply', 'update', 'view',
                            'intransit', 'arrived', 'confirmed', 'delete', 'confirmation', 'intransiting', 'arriving',
                            'list_vehicle', 'sendSms'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['delivery_status'=>'1']);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConfirmed()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['delivery_status'=>'2']);

        return $this->render('confirmed', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Request models.
     * @return mixed
     */
    public function actionIntransit()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['delivery_status'=>'3']);

        return $this->render('intransit', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Request models.
     * @return mixed
     */
    public function actionArrived()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['delivery_status'=>'4']);

        return $this->render('arrived', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Request model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post())) {
            $model->delivery_status = '2';
            $model->user_id = Yii::$app->user->getId();
            $model->save();
            return $this->redirect(['view', 'id' => $model->tracking_number]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tracking_number]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatereply($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'updatereply';

        if ($model->load(Yii::$app->request->post()) ) {

            if($model->supply == 4 || $model->supply == 3){
                $model->vehicle_plate_number = 'ABC-123';
            }else if($model->supply == 1){
                $model->vehicle_plate_number = 'POI-526';
            }else if($model->supply == 2){
                $model->vehicle_plate_number = 'APC-143';
            }

            $model->delivery_status = '3';
            $model->save();
            return $this->redirect(['confirmed']);
        } else {
            return $this->renderAjax('updatereply', [
                'model' => $model,
            ]);
        }
    }

    public function sendSms(){

        $sms = new Sms();


        $sms->transportType    = 'php'; // php
        $sms->transportOptions = [
            'host'       => 'smtp.gmail.com',     // Other domains can also be used
            'username'   => 'johannaheramia@gmail.com',
            'password'   => '<Hubby03>',
            'port'       => '465',
            'encryption' => 'ssl'
        ];
        $carrier = "T-Mobile";
        $number = "+639261523128";
        $subject = "ResponseAble";
        $message = "This message is from responseable";
        $sms->send($carrier, $number, $subject, $message);

        return $this->render(['intransit']);
    }

    public function actionConfirmation($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'confirmation';

        $model->load(Yii::$app->request->post());
        $model->delivery_status = '2';
        $model->save();
        return $this->redirect(['index']);

    }

    public function actionIntransiting($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'intransiting';

        $model->load(Yii::$app->request->post());
        $model->delivery_status = '3';
        $model->save();
        return $this->redirect(['confirmed']);
    }

    public function actionArriving($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'arriving';

        $model->load(Yii::$app->request->post());
        $model->delivery_status = '4';
        $model->save();
        return $this->redirect(['intransit']);
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
