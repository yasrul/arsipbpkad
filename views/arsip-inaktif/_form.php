<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\KodeMasalah;
use app\models\UnitPemilik;
use app\models\UnitPengolah;
use app\models\LokRuang;
use app\models\DpaRef;

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

    <?= $form->field($model, 'kd_pemilik')->widget(Select2::className(), [
        'data' => UnitPemilik::getListPemilik(),
        'options' => ['placeholder' => '[ Pilih Unit Pemilik ]'],
        'pluginOptions' => ['allowClear' => true, 'width'=>'500px']
    ]) ?>

    <?= $form->field($model, 'kd_pengolah')->widget(Select2::className(), [
        'data' => UnitPengolah::getListPengolah(),
        'options' => ['placeholder'=>'[ Pilih Unit Pengolah ]'],
        'pluginOptions' => ['allowClear' => TRUE, 'width'=>'500px']
    ]) ?>

    <?= $form->field($model, 'uraian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kurun_waktu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_ruang')->widget(Select2::className(), [
        'data' => app\models\LokRuang::getListRuang(),
        'options' => ['placeholder'=>'[ Pilih Lokasi Ruang ]'],
        'pluginOptions'=>['allowClear'=>true, 'width'=>'500px'],
    ]) ?>

    <?= $form->field($model, 'kd_rak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_box')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_dpa')->widget(Select2::className(), [
        'data' => DpaRef::getListDpa(),
        'options' => ['placeholder'=>'[ Pilih DPA ]'],
        'pluginOptions'=>['allowClear'=>true, 'width'=>'300px']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
