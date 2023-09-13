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
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  /* background-color: red; */
  /* color: white; */
  /* text-align: center; */
}
</style>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>



    <div class="container">
        <div class="row">
        <!-- <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            -->
            <div class="col-sm-3" ></div>
            <div class="col-sm-6" style="max-width:500px;">
                <!-- <div class="col-md-12" style="border:1px solid black; border-radius: 5px"> -->
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    <br/><br/><br/><br/><br/><br/>

                <!-- </div> -->
            </div>

            <div class="col-sm-3"></div>
        </div>
    </div>
<!-- </div> -->
<?php $this->endBody() ?>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Watches Trader <?= date('Y') ?></p>
    </div>
</footer>

</body>

</html>
<?php $this->endPage() ?>
