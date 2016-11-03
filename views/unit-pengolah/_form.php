<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitPengolah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-pengolah-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'nama_pengolah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
