<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WarehouseHasSupplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Has Supplies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-has-supply-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Warehouse Has Supply', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'warehouse_id',
            'supply_list_of_supply_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
