<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\KodeMasalah;
use app\models\UnitPemilik;
use app\models\UnitPengolah;
use app\models\LokRuang;
use app\models\LokRak;
use app\models\DpaRef;
use yii\helpers\Url;

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

    <?= $form->field($model, 'kurun_waktu')->textInput(['maxlength' => true, 'style'=>'width : 300px']) ?>

    <?= $form->field($model, 'kd_ruang')->widget(Select2::className(), [
        'data' => LokRuang::getListRuang(),
        'options' => ['id'=>'kd-ruang', 'placeholder'=>'[ Pilih Ruang ]'],
        'pluginOptions'=>['allowClear'=>true, 'width'=>'500px'],
    ]) ?>

    <?= $form->field($model, 'kd_rak')->widget(Select2::className(), [
        'data'=> LokRak::getListRak(),
        'options'=> ['id'=>'kd-rak','placeholder'=>'[ Pilih Rak]'],
        'pluginOptions'=>['allowClear'=>true, 'width'=>'500px']
    ]) ?>

    <?= $form->field($model, 'no_box')->textInput(['maxlength' => true, 'style'=>'width: 300px']) ?>

    <?= $form->field($model, 'kd_dpa')->widget(Select2::className(), [
        'data' => DpaRef::getListDpa(),
        'options' => ['placeholder'=>'[ Pilih DPA ]'],
        'pluginOptions'=>['allowClear'=>true, 'width'=>'300px']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <?php
    $this->registerJs('
        $("#kd-rak").attr("disabled",true);
        $("#kd-ruang").change( function() {
            $.get("'.Url::to(['get-raks','kdRuang'=>'']).'" + $(this).val(), function(data) {
                select = $("#kd-rak");
                select.empty();
                var options = "<option value=\'\'>[ Pilih Rak ]</option>";
                $.each(data.raks, function(key, value) {
                    options += "<option value=\'"+value.kode+"\'>"+value.nama_rak+"</option>";
                });
                select.append(options);
                $("#kd-rak").attr("disabled", false);
            })
        })
    ');
    ?>

</div>
