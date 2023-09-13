<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = "Home";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Home</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'youtube_title')->textarea(['rows'=>2])?>
<?= $form->field($model, 'youtube_url')->textarea(['rows'=>2])?>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>