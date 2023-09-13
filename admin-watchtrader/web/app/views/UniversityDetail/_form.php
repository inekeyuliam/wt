<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UniversityDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_university')->textInput() ?>

    <?= $form->field($model, 'id_level')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
