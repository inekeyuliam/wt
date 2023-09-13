<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = "Brand";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Brand</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?=
  
        $form->field($model, 'brand_id')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(MasterBrand::find()->all(),'id','nama'),
            'options' => ['placeholder' => 'Select brand ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Brand');
        
?>
<br><br>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>