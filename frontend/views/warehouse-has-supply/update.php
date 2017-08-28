<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarehouseHasSupply */

$this->title = 'Update Warehouse Has Supply: ' . $model->supply_list_of_supply_code;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Has Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supply_list_of_supply_code, 'url' => ['view', 'id' => $model->supply_list_of_supply_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-has-supply-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
