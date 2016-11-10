<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */

$this->title = 'Arsip BPKAD Provinsi NTB';
?>
<div class="arsip-inaktif-index">

    <h1 align="center">e-Arsip BPKAD Provinsi NTB<i class="fa fa-folder-open"></i></h1>
    <p align="center" class="lead">Sistem Informasi Arsip Inaktif</p>
    <?php
        echo Collapse::widget([
        'items'=> [
            [
                'label'=>'Pencarian Tambahan',
                'content'=> $this->render('/arsip-inaktif/_search', ['model' => $searchModel])
            ]
        ]
    ]);   
    ?>

    <p>
        <?php //echo Html::a('Create Arsip Inaktif', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager'=>[
            'firstPageLabel'=>'First',
            'lastPageLabel'=>'Last',
            'maxButtonCount'=>10
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=>'no_def', 'contentOptions'=>['style'=>'width : 5%']],
            ['attribute'=>'kd_masalah', 'contentOptions'=>['style'=>'width : 5%']],
            ['attribute'=>'unitPemilik', 'value'=>'pemilik.nama_instansi'],
            ['attribute' => 'linkArsip', 'format' => 'raw', 'label' => 'Uraian'],
            //'uraian',
            ['attribute'=>'kurun_waktu', 'contentOptions'=>['style'=>'width:8%']],
            // 'kd_ruang',
            ['attribute'=> 'unitPengolah', 'value'=>'pengolah.nama_pengolah'],
            //['attribute'=>'namaRak', 'value'=>'rak.nama_rak', 'contentOptions'=>['style'=>'width:8%']],
            //['attribute'=> 'no_box', 'contentOptions'=> ['style'=>'width : 7%']],
            //'kd_dpa',
            ['attribute'=>'ketDpa', 'value'=>'dpa.keterangan'],

            //['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width : 6%']],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>