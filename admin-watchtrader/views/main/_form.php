<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = "Main";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Main</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'title')->textInput()?>
<?= $form->field($model, 'subtitle')->textInput()?>
<?= $form->field($model, 'video')->fileInput();   ?>
<?php echo '<video width="320" height="50%" controls autoplay><source  type="video/mp4" src="../../../data/main/'. $model->video.'" class=" img-responsive" width="20%" height="20%" ></video>'?><br><br>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>