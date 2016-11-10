<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Collapse;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ArsipInaktifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arsip Inaktif';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-inaktif-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        echo Collapse::widget([
        'items'=> [
            [
                'label'=>'Pencarian Tambahan',
                'content'=> $this->render('_search', ['model' => $searchModel])
            ]
        ]
    ]);   
    ?>

    <p>
        <?= Html::a('Create Arsip Inaktif', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'kd_pengolah',
            ['attribute' => 'linkArsip', 'format' => 'raw', 'label' => 'Uraian'],
            ['attribute'=>'kurun_waktu', 'contentOptions'=>['style'=>'width:8%']],
            ['attribute'=> 'unitPengolah', 'value'=>'pengolah.nama_pengolah'],
            // 'kd_ruang',
            //['attribute'=>'namaRak', 'value'=>'rak.nama_rak', 'contentOptions'=>['style'=>'width:8%']],
            //['attribute'=> 'no_box', 'contentOptions'=> ['style'=>'width : 7%']],
            //'kd_dpa',
            ['attribute'=>'ketDpa', 'value'=>'dpa.keterangan'],

            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width : 6%']],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
