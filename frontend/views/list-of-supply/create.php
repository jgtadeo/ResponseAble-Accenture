<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ListOfSupply */

$this->title = 'Create List Of Supply';
$this->params['breadcrumbs'][] = ['label' => 'List Of Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-of-supply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
