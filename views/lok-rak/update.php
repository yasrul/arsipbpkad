<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LokRak */

$this->title = 'Update Lok Rak: ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lok Rak', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lok-rak-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
