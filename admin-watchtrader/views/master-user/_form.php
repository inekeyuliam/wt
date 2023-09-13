<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Url;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-body">
          
            <div class="row">

            <div class="col-md-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            </div>
          
            <?php if($model->isNewRecord) : ?>
            <div class="col-md-12">
                <?= $form->field($model, 'password')->input('password',['id'=>'pass']) ?>
            </div>
            <?php endif ?>
            <div class="col-md-12">
                <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <br>
        <br>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-success','id'=>'btn']) ?>
            <a class='btn btn-lg btn-danger' style="margin-left:20px;vertical-align: sub;text-decoration:none" href="index">Cancel</a>

        </div>
    <br>
    <?php ActiveForm::end(); ?>

    </div>

</div>

<script>
 
</script>