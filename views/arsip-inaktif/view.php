<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipInaktif */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Arsip Inaktif', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-inaktif-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_def',
            ['label'=>'Kode Masalah', 'attribute'=>'textMasalah'],
            'pemilik.nama_instansi',
            'pengolah.nama_pengolah',
            'uraian',
            'kurun_waktu',
            'ruang.nama_ruang',
            'rak.nama_rak',
            'no_box',
            'dpa.keterangan'
        ],
    ]) ?>

</div>
