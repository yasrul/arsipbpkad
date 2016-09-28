<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LokRakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lokasi Rak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-rak-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lokasi Rak', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style'=>'width:80%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'kode', 'contentOptions'=>['style'=>'width:10%']],
            //'kd_ruang',
            ['attribute'=>'namaRuang', 'value'=>'ruang.nama_ruang'],
            'nama_rak',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width:8%']],
        ],
    ]); ?>
</div>
