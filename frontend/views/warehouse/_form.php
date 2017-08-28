<?php

use common\models\Barangay;
use common\models\WarehouseCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_person_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year_established')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'timestamp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_hours')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'close_hours')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_category')->dropDownList(
        ArrayHelper::map(WarehouseCategory::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Select Warehouse category',

        ]);?>

    <?= $form->field($model, 'barangay_id')->dropDownList(
        ArrayHelper::map(Barangay::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Select Barangay',

        ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
