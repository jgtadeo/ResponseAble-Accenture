<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicle */

$this->title = $model->plate_number;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->plate_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->plate_number], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'plate_number',
            'model',
            'is_lease',
            'timestamp',
            'available_day',
            'available_hour_start',
            'available_hour_end',
            'vehicle_type',
            'vehicle_category',
            'owner',
            'vehicle_size',
            'barangay_id',
            'length_in_ft',
            'width_in_ft',
            'height_in_ft',
            'maximum_capacity_in_kg',
            'max_distance',
        ],
    ]) ?>

</div>
