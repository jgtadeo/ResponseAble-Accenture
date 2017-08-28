<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupplierHasSupply */

$this->title = 'Update Supplier Has Supply: ' . $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Supplier Has Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplier_id, 'url' => ['view', 'supplier_id' => $model->supplier_id, 'supply_code' => $model->supply_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplier-has-supply-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
