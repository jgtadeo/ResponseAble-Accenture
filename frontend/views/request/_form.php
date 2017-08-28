<?php

use common\models\ListOfSupply;
use common\models\Supply;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_needed')->widget(DatePicker::className(), [
        'readonly' => true,
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose' => false,
            'todayHighlight' => true,
            'format' => 'mm/dd/yyyy',
            'startDate' => "mm/dd/yyyy",
            'clearBtn' => true
        ]
    ]); ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'supply')->dropDownList(
        ArrayHelper::map(ListOfSupply::find()->all(), 'code', 'name'),
        [
            'prompt' => 'Select Supply',

        ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
