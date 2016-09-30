<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\UnitPengolah;
use app\models\DpaRef;

/* @var $this yii\web\View */
/* @var $model app\models\search\ArsipInaktifSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-inaktif-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['maxLength'=> true, 'style'=> 'width:100px']) ?>

    <!--<?= $form->field($model, 'no_def') ?>

    <?= $form->field($model, 'kd_masalah') ?>

    <?= $form->field($model, 'kd_pemilik') ?>-->

    <?= $form->field($model, 'namaPengolah')->textInput(['maxLength'=> true, 'style'=> 'width: 500px']) ?>

    <?php // echo $form->field($model, 'uraian') ?>

    <?php // echo $form->field($model, 'kurun_waktu') ?>

    <?php // echo $form->field($model, 'kd_ruang') ?>

    <?php // echo $form->field($model, 'kd_rak') ?>

    <?php // echo $form->field($model, 'no_box') ?>

    <?php echo $form->field($model, 'ketDpa')->textInput(['maxLength'=>true, 'style'=> 'width: 500px']) ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-11">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
