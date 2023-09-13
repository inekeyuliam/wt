<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAkta */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' =>  'Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
