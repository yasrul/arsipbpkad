<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KodeMasalahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kode Masalah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kode-masalah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kode Masalah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'kode', 'contentOptions'=>['style'=>'width: 10%']],
            'masalah',
            'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
