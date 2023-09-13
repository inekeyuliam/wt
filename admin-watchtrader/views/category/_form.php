<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Brands;

$this->title = "Category";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Category</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?=
  
        $form->field($model, 'brandsid')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(Brands::find()->all(),'id','name'),
            'options' => ['placeholder' => 'Select brand ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Brand');
        
?>
<?= $form->field($model, 'name')->textInput()?>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>