<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tracking_number',
            'date_requested',
            'date_needed',
            'quantity',
            'description:ntext',
            // 'delivery_status',
            // 'user_id',
            // 'supply',
            // 'vehicle_plate_number',

            [

                'format' => 'raw',
                'value' => function($model) {
                    return Html::a(
                        '<b>Confirm</b>',
                        Url::to(['request/confirmation', 'id' => $model->tracking_number]),
                        [
                            'id'=>'grid-custom-button',
                            'data-pjax'=>true,
                            'action'=>Url::to(['request/confirmation', 'id' => $model->tracking_number]),
                            'class'=>'button btn-sm btn-primary',
                        ]
                    );
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
