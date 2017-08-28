<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListOfSupply */

$this->title = 'Update List Of Supply: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'List Of Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="list-of-supply-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
