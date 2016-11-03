<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnitPemilik */

$this->title = 'Update Unit Pemilik: ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Unit Pemilik', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-pemilik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
