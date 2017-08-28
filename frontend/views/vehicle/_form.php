<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plate_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_lease')->textInput() ?>

    <?= $form->field($model, 'timestamp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available_day')->dropDownList([ 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'available_hour_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available_hour_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_type')->textInput() ?>

    <?= $form->field($model, 'vehicle_category')->textInput() ?>

    <?= $form->field($model, 'owner')->textInput() ?>

    <?= $form->field($model, 'vehicle_size')->textInput() ?>

    <?= $form->field($model, 'barangay_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length_in_ft')->textInput() ?>

    <?= $form->field($model, 'width_in_ft')->textInput() ?>

    <?= $form->field($model, 'height_in_ft')->textInput() ?>

    <?= $form->field($model, 'maximum_capacity_in_kg')->textInput() ?>

    <?= $form->field($model, 'max_distance')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
