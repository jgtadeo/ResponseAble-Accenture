<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Confirmed Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        Modal::begin([
            'id'=> 'modal',
            'size' => 'modal-xs',
        ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>

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
                    return Html::button(
                        '<b>Send</b>',
                        [
                            'value' => Url::to(['request/updatereply', 'id' => $model->tracking_number]),
                            'id'=>'modalButton',
                            'class'=>'button btn-sm btn-primary loader',
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
<style type="text/css">
    #loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
