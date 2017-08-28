<?php
use common\models\Vehicle;
use common\models\Volunteer;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="form-group">
        <?php
        if($model->supply == 1 || $model->supply == 2 || $model->supply == 3 || $model->supply == 4){
            echo Html::submitButton($model->isNewRecord ? 'Reply' : 'Reply', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        }else if($model->supply == 5){
            echo Html::button('Text', [
                'value' => Url::to(['request/sendSms']),
                'class'=>'button btn-sm btn-primary loader',]);
        }?>

    </div>


        <?= $form->field($model, 'vehicle_plate_number')->dropDownList(
            ArrayHelper::map(Vehicle::find()->all(), 'plate_number', 'plate_number'),
            [
                'prompt' => 'Vehicle ',

            ]); ?>


    <?php ActiveForm::end(); ?>

</div>
