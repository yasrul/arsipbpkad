<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\KodeMasalah;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipInaktif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-inaktif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_masalah')->widget(Select2::className(), [
        'data'=> KodeMasalah::getListMasalah(),
        'options' => ['placeholder'=>'[ Pilih Kode Masalah]'],
        'pluginOptions' => ['allowClear'=>true, 'width'=>'500px']
    ]) ?>

    <?= $form->field($model, 'kd_pemilik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_pengolah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uraian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kurun_waktu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_ruang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_rak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_box')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_dpa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
