<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'plate_number') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'is_lease') ?>

    <?= $form->field($model, 'timestamp') ?>

    <?= $form->field($model, 'available_day') ?>

    <?php // echo $form->field($model, 'available_hour_start') ?>

    <?php // echo $form->field($model, 'available_hour_end') ?>

    <?php // echo $form->field($model, 'vehicle_type') ?>

    <?php // echo $form->field($model, 'vehicle_category') ?>

    <?php // echo $form->field($model, 'owner') ?>

    <?php // echo $form->field($model, 'vehicle_size') ?>

    <?php // echo $form->field($model, 'barangay_id') ?>

    <?php // echo $form->field($model, 'length_in_ft') ?>

    <?php // echo $form->field($model, 'width_in_ft') ?>

    <?php // echo $form->field($model, 'height_in_ft') ?>

    <?php // echo $form->field($model, 'maximum_capacity_in_kg') ?>

    <?php // echo $form->field($model, 'max_distance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
