<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ListOfSupply */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'List Of Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-of-supply-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->code], [
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
            'code',
            'name',
            'date_expiration',
            'date_received',
            'description:ntext',
            'timestamp',
            'supply_type_id',
            'unit_of_measurement_id',
            'barangay_id',
            'weight',
            'temperature_requirement',
            'texture',
            'is_sensitive',
            'size',
        ],
    ]) ?>

</div>
