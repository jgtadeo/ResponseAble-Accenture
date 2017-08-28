<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SupplierHasSupplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplier Has Supplies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-has-supply-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Supplier Has Supply', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'supplier_id',
            'supply_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
