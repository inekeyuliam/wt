<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Brands;
use app\models\Category;

$this->title = "Collection";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Collection</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput()?>
<?= $form->field($model, 'image_banner')->fileInput() ?>
    <?php  if($model->image_banner){ ?>
            <?=   Html::img('../../../data/collections/'. $model['image_banner'],['width' => '20%']);?>
    <?php   } ?>
<br><br>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>