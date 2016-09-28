<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LokRuang */

$this->title = 'Create Lok Ruang';
$this->params['breadcrumbs'][] = ['label' => 'Lok Ruangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-ruang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
