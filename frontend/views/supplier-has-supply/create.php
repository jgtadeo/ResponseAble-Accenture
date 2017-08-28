<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SupplierHasSupply */

$this->title = 'Create Supplier Has Supply';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Has Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-has-supply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
