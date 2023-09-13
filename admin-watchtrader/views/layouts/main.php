<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="../js/easy-autocomplete.css">
    <link rel="stylesheet" href="../js/easy-autocomplete.themes.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script
    <script src="../js/jquery.easy-autocomplete.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css">
    
    <!-- <link rel="icon" type="image/x-icon" href="<?=Yii::$app->homeUrl?>favicon.ico" /> -->
    <?php $this->head() ?>
</head>
<?php if(Yii::$app->user->isGuest){
  echo $this->render(
        'main-login',
        ['content' => $content]
    );
 }else{ ?>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        // 'brandLabel' => "Vista",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
              
              ['label' => 'Home','url' => ['/home/index']],
              ['label' => 'About', 'url' => ['/about/index']],
              ['label' => 'Config', 'url' => ['/config/index']],
              ['label' => 'Contact', 'url' => ['/contact/index']],
              ['label' => 'Dealers', 'url' => ['/dealers/index']],
              ['label' => 'Events', 'url' => ['/event/index']],
              ['label' => 'Artists', 'url' => ['/artists/index']],
              ['label' => 'Master Data',  
                'items' => [
                    ['label' => 'Master User', 'url' => ['/master-user/index']],
                    ['label' => 'Master Highlighted Brand', 'url' => ['/highlight-brands/index']],
                    ['label' => 'Master Highlighted Items', 'url' => ['/highlight-brand-items/index']],
                    ['label' => 'Master Product Image', 'url' => ['/products/index']],
                    ['label' => 'Master Collections', 'url' => ['/master-collections/index']],
                    ['label' => 'Master Item Collection', 'url' => ['/master-item-collection/index']],

                ],
            ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
   
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
              ['label' => '<i class="fas fa-home"></i>', 'url' => ['/']]
          ],
    ]);
 
  

    NavBar::end();
    ?>

    <div class="container">
        <div class="row">
        <!-- <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            -->
            <div class="col-md-12">
                <!-- <div class="col-md-12" style="border:1px solid black; border-radius: 5px"> -->
                    <?= Alert::widget() ?>
                    <?= $content ?>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Watches Trader <?= date('Y') ?></p>

        <!-- <p class="pull-right"><= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
<?php } ?>
</html>
<?php $this->endPage() ?>
