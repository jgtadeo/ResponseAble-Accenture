<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleHasDriver */

$this->title = 'Update Vehicle Has Driver: ' . $model->vehicle_plate_number;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Has Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_plate_number, 'url' => ['view', 'id' => $model->vehicle_plate_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-has-driver-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
