<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Province */

$this->title = 'Update Province: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Provinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'region_id' => $model->region_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="province-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
