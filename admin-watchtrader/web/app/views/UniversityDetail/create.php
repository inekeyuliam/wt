<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UniversityDetail */

$this->title = 'Create University Detail';
$this->params['breadcrumbs'][] = ['label' => 'University Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
