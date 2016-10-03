<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\PermissionHelpers;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Arsip BPKAD Provinsi NTB',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];
    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'SignUp', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        
        $menuItems[] = ['label'=>'Referensi', 'items'=>[
            ['label'=>'Info DPA', 'url'=>['dpa-ref/index']],
            ['label'=>'Kode Masalah', 'url'=>['kode-masalah/index']],
            ['label'=>'Unit Pemilik', 'url'=>['unit-pemilik/index']],
            ['label'=>'Unit Pengolah', 'url'=>['unit-pengolah/index']],       
            ['label'=>'Lokasi Ruang', 'url'=>['lok-ruang/index']],
            ['label'=>'Lokasi Rak', 'url'=>['lok-rak/index']]
        ]];
        
        $menuItems[] = ['label'=>'Arsip', 'items' => [
            ['label' => 'Kelola', 'url'=>['arsip-inaktif/index']],
            ['label' => 'Laporan', 'url'=>['laporan/lap-dpa']]
        ]];
        
        if (PermissionHelpers::requireMinimumRole('AdminSystem')) {
            $menuItems[] = ['label'=>'Admin', 'items'=> [
                ['label'=>'User','url'=>['user/index']],
                ['label'=>'Role', 'url'=>['role/index']],
                ['label'=>'Status', 'url'=>['status/index']],
            ]];
        }
        $menuItems[] = [
            'label'=>'Logout ('.Yii::$app->user->identity->username.')',
            'url'=>['/site/logout'],
            'linkOptions'=>['data-method'=>'post'],
            ];  
    }
    $menuItems[] = ['label' => 'About', 'url' => ['/site/about']];
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; BPKAD Prov. NTB <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
