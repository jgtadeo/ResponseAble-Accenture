<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'In Transit Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tracking_number',
            'supply',
            'date_needed',
            [
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a(
                        '<b>Arrived</b>',
                        Url::to(['request/arriving', 'id' => $model->tracking_number]),
                        [
                            'id'=>'grid-custom-button',
                            'action'=>Url::to(['request/arriving', 'id' => $model->tracking_number]),
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
