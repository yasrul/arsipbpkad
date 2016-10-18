<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker

/* @var $this yii\web\View */
/* @var $model app\models\DpaRef */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dpa-ref-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'tahun_bulan')->widget(DatePicker::className(),[
        'options'=>['placeholder'=>'[ Pilih Bulan Tahun ]','style'=>'width:300px'],
        'pluginOptions'=>[
            'autoclose'=>TRUE,
            'startView'=>'year',
            'minViewMode'=>'months',
            'format'=>'yyyy-mm-00',
        ]
    ]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
