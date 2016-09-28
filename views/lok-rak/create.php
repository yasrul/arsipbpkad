<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LokRak */

$this->title = 'Create Lok Rak';
$this->params['breadcrumbs'][] = ['label' => 'Lok Raks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-rak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
