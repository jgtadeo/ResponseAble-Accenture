<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CityMunicipal */

$this->title = 'Update City Municipal: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'City Municipals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'province_id' => $model->province_id, 'province_region_id' => $model->province_region_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-municipal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
