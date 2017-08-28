<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ListOfSupplySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-of-supply-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date_expiration') ?>

    <?= $form->field($model, 'date_received') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <?php // echo $form->field($model, 'supply_type_id') ?>

    <?php // echo $form->field($model, 'unit_of_measurement_id') ?>

    <?php // echo $form->field($model, 'barangay_id') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'temperature_requirement') ?>

    <?php // echo $form->field($model, 'texture') ?>

    <?php // echo $form->field($model, 'is_sensitive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
