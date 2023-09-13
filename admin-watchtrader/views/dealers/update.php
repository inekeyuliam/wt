<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAkta */

$this->title = 'Update Dealer ';
$this->params['breadcrumbs'][] = ['label' => 'Dealer', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-bank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
