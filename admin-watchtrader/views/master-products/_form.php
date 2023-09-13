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
            <?= $form->field($model, 'indexorder')->textInput() ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'image')->fileInput() ?>
            <?php  if($model->isNewRecord == false){ ?>
            <?=   Html::img('../../../data/products/'. $model['image'],['width' => '50%']);?>
            <?php   } ?>
            <br><br>
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

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
