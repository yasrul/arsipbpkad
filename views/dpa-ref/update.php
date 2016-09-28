<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DpaRef */

$this->title = 'Update Info DPA : ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Info DPA', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dpa-ref-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
