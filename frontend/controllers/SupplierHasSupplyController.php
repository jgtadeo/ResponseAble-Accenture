<?php

namespace frontend\controllers;

use Yii;
use common\models\SupplierHasSupply;
use common\models\SupplierHasSupplySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SupplierHasSupplyController implements the CRUD actions for SupplierHasSupply model.
 */
class SupplierHasSupplyController extends Controller
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
     * Lists all SupplierHasSupply models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SupplierHasSupplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SupplierHasSupply model.
     * @param integer $supplier_id
     * @param integer $supply_code
     * @return mixed
     */
    public function actionView($supplier_id, $supply_code)
    {
        return $this->render('view', [
            'model' => $this->findModel($supplier_id, $supply_code),
        ]);
    }

    /**
     * Creates a new SupplierHasSupply model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SupplierHasSupply();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'supplier_id' => $model->supplier_id, 'supply_code' => $model->supply_code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SupplierHasSupply model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $supplier_id
     * @param integer $supply_code
     * @return mixed
     */
    public function actionUpdate($supplier_id, $supply_code)
    {
        $model = $this->findModel($supplier_id, $supply_code);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'supplier_id' => $model->supplier_id, 'supply_code' => $model->supply_code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SupplierHasSupply model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $supplier_id
     * @param integer $supply_code
     * @return mixed
     */
    public function actionDelete($supplier_id, $supply_code)
    {
        $this->findModel($supplier_id, $supply_code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SupplierHasSupply model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $supplier_id
     * @param integer $supply_code
     * @return SupplierHasSupply the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($supplier_id, $supply_code)
    {
        if (($model = SupplierHasSupply::findOne(['supplier_id' => $supplier_id, 'supply_code' => $supply_code])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
