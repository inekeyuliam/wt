<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = "Contact";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Contact</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'office')->textarea(['rows'=>8])?>
<?= $form->field($model, 'googlemaps')->textarea(['rows'=>8])?>
<?= $form->field($model, 'phone')->textInput()?>
<?= $form->field($model, 'whatsapp')->textInput()?>
<?= $form->field($model, 'email')->textInput()?>
<?= $form->field($model, 'instagram')->textInput()?>
<?= $form->field($model, 'facebook')->textInput()?>
<?= $form->field($model, 'twitter')->textInput()?>
<?= $form->field($model, 'youtube')->textInput()?>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>