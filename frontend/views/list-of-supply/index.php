<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ListOfSupplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Of Supplies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-of-supply-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create List Of Supply', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name',
            'date_expiration',
            'date_received',
            'description:ntext',
            // 'timestamp',
            // 'supply_type_id',
            // 'unit_of_measurement_id',
            // 'barangay_id',
            // 'weight',
            // 'temperature_requirement',
            // 'texture',
            // 'is_sensitive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
