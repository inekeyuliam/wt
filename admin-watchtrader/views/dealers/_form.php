<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAkta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-bank-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="clearfix"></div> <br>
        

        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'address')->textInput() ?>
            <?= $form->field($model, 'city')->textInput() ?>
            <?= $form->field($model, 'phone')->textInput() ?>
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'website')->textInput() ?>

        </div>


    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function checkOption(name){
        // alert(name);
    }
</script>
