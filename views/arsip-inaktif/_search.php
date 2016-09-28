<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ArsipInaktifSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-inaktif-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_fisis') ?>

    <?= $form->field($model, 'kd_masalah') ?>

    <?= $form->field($model, 'kd_pemilik') ?>

    <?= $form->field($model, 'kd_pengolah') ?>

    <?php // echo $form->field($model, 'uraian') ?>

    <?php // echo $form->field($model, 'kurun_waktu') ?>

    <?php // echo $form->field($model, 'kd_ruang') ?>

    <?php // echo $form->field($model, 'kd_rak') ?>

    <?php // echo $form->field($model, 'no_box') ?>

    <?php // echo $form->field($model, 'kd_dpa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
