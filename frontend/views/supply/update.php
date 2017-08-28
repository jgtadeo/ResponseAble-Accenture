<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Supply */

$this->title = 'Update Supply: ' . $model->list_of_supply_code;
$this->params['breadcrumbs'][] = ['label' => 'Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->list_of_supply_code, 'url' => ['view', 'id' => $model->list_of_supply_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supply-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
