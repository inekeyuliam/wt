<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = "About";
?>
<div class="row">
    <div class="col-md-12">
        <h3>About</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'content_short')->textarea(['rows'=>18])?>
<?= $form->field($model, 'content_long')->textarea(['rows'=>18])?>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>