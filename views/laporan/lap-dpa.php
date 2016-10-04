<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Laporan DPA';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="laporan-dpa">
    <?php $form = ActiveForm::begin([
        'action' => ['lap-dpa'],
        'method' => 'get'
    ]); ?>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'ymDpa1')->textInput(['maxlength'=> true, 'options'=>['id'=>'datepicker','readonly'=>'readonly']]) ?>
            <?= $form->field($model, 'ymDpa2') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'unitPemilik') ?>
            <?= $form->field($model, 'unitPengolah') ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Seleksi', ['class' => 'btn btn-primary']) ?> &nbsp;&nbsp;
        <?= Html::a('Export PDF', ['exp-pdf'],['class'=>'btn btn-info']) ?>
        <?= Html::a('Export Excel',['exp-excel'],['class'=>'btn btn-info']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'formatter' => ['class'=>'yii\i18n\Formatter' ,'nullDisplay'=>''],
        'pager'=>[
            'firstPageLabel'=>'First',
            'lastPageLabel'=>'Last',
            'maxButtonCount'=>5
        ],
        'columns' => [
            ['class'=>'yii\grid\SerialColumn', 'contentOptions'=>['style'=>'width : 6%']],
            'no_def',
            ['attribute'=>'kd_masalah', 'contentOptions'=>['style'=>'width : 5%']],
            ['attribute'=>'unitPemilik', 'value'=>'pemilik.nama_instansi'],
            'uraian',
            ['attribute'=>'kurun_waktu', 'contentOptions'=>['style'=>'width:8%']],
            ['attribute'=> 'unitPengolah', 'value'=>'pengolah.nama_pengolah'],
            ['attribute'=>'ketDpa', 'value'=>'dpa.keterangan'],
        ]
    ]); ?>
    
    <?php $this->registerJs('
            $("#datepicker").datepicker( {
    format: "mm",
    viewMode: "months", 
    minViewMode: "months"
});'
            )
    
    ?>
   
</div>

