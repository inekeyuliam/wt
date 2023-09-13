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
<h1>Reset Password</h1>
    <br>
    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                   <label >Name</label>
                </div>
                <div class="col-md-2">
                   <label ><?= $model->name ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                   <label >Username</label>
                </div>
                <div class="col-md-2">
                   <label ><?= $model->username ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                   <label >Password</label>
                </div>
                <div class="col-md-5">
                   <?= $form->field($model, 'password')->input('password',['id'=>'pass'])->label(false) ?>
                </div>
            </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-md btn-success','id'=>'btn']) ?>
            <a class='btn btn-md btn-danger' style="margin-left:20px;vertical-align: sub;text-decoration:none" href="index">Cancel</a>

        </div>
    <br>
    <?php ActiveForm::end(); ?>

    </div>
    </div>
    </div>

</div>

<script>
</script>

