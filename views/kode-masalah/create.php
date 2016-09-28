<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KodeMasalah */

$this->title = 'Create Kode Masalah';
$this->params['breadcrumbs'][] = ['label' => 'Kode Masalahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kode-masalah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
