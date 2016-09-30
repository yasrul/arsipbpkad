<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ArsipInaktifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arsip Inaktif';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-inaktif-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Arsip Inaktif', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=>'no_def', 'contentOptions'=>['style'=>'width : 5%']],
            ['attribute'=>'kd_masalah', 'contentOptions'=>['style'=>'width : 5%']],
            ['attribute'=>'namaPemilik', 'value'=>'pemilik.nama_instansi'],
            //'kd_pengolah',
            'uraian',
            ['attribute'=>'kurun_waktu', 'contentOptions'=>['style'=>'width:8%']],
            // 'kd_ruang',
            ['attribute'=>'namaRak', 'value'=>'rak.nama_rak', 'contentOptions'=>['style'=>'width:8%']],
            'no_box',
            //'kd_dpa',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width : 6%']],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
