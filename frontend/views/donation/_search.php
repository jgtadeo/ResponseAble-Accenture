<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DonationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'method') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'donation_type') ?>

    <?php // echo $form->field($model, 'donor') ?>

    <?php // echo $form->field($model, 'supply') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
