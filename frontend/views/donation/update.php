<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Donation */

$this->title = 'Update Donation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Donations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'donation_type' => $model->donation_type, 'donor' => $model->donor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="donation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
