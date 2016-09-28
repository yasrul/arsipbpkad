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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Arsip Inaktif', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'no_def',
            'kd_masalah',
            'kd_pemilik',
            'kd_pengolah',
            'uraian',
            'kurun_waktu',
            // 'kd_ruang',
            'kd_rak',
            'no_box',
            'kd_dpa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
