<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsipInaktif */

$this->title = 'Create Arsip Inaktif';
$this->params['breadcrumbs'][] = ['label' => 'Arsip Inaktif', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-inaktif-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
