<?php

namespace frontend\controllers;

use Yii;
use common\models\Donation;
use common\models\DonationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonationController implements the CRUD actions for Donation model.
 */
class DonationController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Donation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donation model.
     * @param integer $id
     * @param integer $donation_type
     * @param integer $donor
     * @return mixed
     */
    public function actionView($id, $donation_type, $donor)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $donation_type, $donor),
        ]);
    }

    /**
     * Creates a new Donation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'donation_type' => $model->donation_type, 'donor' => $model->donor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Donation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $donation_type
     * @param integer $donor
     * @return mixed
     */
    public function actionUpdate($id, $donation_type, $donor)
    {
        $model = $this->findModel($id, $donation_type, $donor);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'donation_type' => $model->donation_type, 'donor' => $model->donor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Donation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $donation_type
     * @param integer $donor
     * @return mixed
     */
    public function actionDelete($id, $donation_type, $donor)
    {
        $this->findModel($id, $donation_type, $donor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $donation_type
     * @param integer $donor
     * @return Donation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $donation_type, $donor)
    {
        if (($model = Donation::findOne(['id' => $id, 'donation_type' => $donation_type, 'donor' => $donor])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
