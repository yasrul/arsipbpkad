<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DpaRef */

$this->title = 'Create Info DPA';
$this->params['breadcrumbs'][] = ['label' => 'Info DPA', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpa-ref-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
