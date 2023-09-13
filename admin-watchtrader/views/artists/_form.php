<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = "Artist";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Artist</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput()?>
<?= $form->field($model, 'profile')->textInput()?>
<?= $form->field($model, 'image')->fileInput() ?>
    <?php  if($model->image){ ?>
            <?=   Html::img('../../../../data/artists/'. $model['image'],['width' => '100px']);?>
    <?php   } ?>
<br><br>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>