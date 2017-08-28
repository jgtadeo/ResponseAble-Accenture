<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

if($model->supply == 1 || $model->supply == 2 || $model->supply == 3 || $model->supply == 4){
    $this->title = 'VEHICLE FOUND!';
}else if($model->supply == 5){
    $this->title = 'VEHICLE NOT FOUND! Text volunteers';
}

$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tracking_number, 'url' => ['view', 'id' => $model->tracking_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-update">

    <h1><?= Html::encode($this->title)?></h1>

    <?= $this->render('_formcreatereply', [
        'model' => $model,
    ]) ?>



</div>
