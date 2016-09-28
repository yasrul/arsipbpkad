<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KodeMasalah */

$this->title = 'Update Kode Masalah: ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Kode Masalah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kode-masalah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
