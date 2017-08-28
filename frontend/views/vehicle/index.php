<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vehicle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'plate_number',
            'model',
            'is_lease',
            'timestamp',
            'available_day',
            // 'available_hour_start',
            // 'available_hour_end',
            // 'vehicle_type',
            // 'vehicle_category',
            // 'owner',
            // 'vehicle_size',
            // 'barangay_id',
            // 'length_in_ft',
            // 'width_in_ft',
            // 'height_in_ft',
            // 'maximum_capacity_in_kg',
            // 'max_distance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
