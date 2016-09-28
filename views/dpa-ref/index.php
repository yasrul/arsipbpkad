<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\DpaRefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Info DPA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpa-ref-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Info DPA', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style'=>'width: 80%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'contentOptions'=>['style'=>'width : 5%']],

            ['attribute'=>'kode', 'contentOptions'=>['style'=>'width:10%']],
            ['attribute'=>'tahun_bulan', 'contentOptions'=>['style'=>'width : 15%']],
            'keterangan',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width:9%']],
        ],
    ]); ?>
</div>
