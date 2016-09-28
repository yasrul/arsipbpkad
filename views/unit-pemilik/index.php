<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UnitPemilikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unit Pemilik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-pemilik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Unit Pemilik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style'=>'width : 70%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'kode', 'contentOptions'=>['style'=>'width : 10%']],
            'nama_instansi',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width : 9%']],
        ],
    ]); ?>
</div>
