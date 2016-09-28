<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LokRuang;

/* @var $this yii\web\View */
/* @var $model app\models\LokRak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lok-rak-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true, 'style'=>'width : 200px']) ?>

    <?= $form->field($model, 'kd_ruang')->dropDownList(LokRuang::getListRuang(),[
        'prompt'=>'[ Pilih Ruang ]',
        'style'=>'width : 300px',
    ]) ?>

    <?= $form->field($model, 'nama_rak')->textInput(['maxlength' => true, 'style'=>'width : 700px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
