<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Brands;
use app\models\Category;

$this->title = "Product";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Product</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput()?>
<?=
  
        $form->field($model, 'brandid')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(Brands::find()->all(),'id','name'),
            'options' => ['placeholder' => 'Select brand ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Brand');
        
?>
<?=
  
        $form->field($model, 'categoryid')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(Category::find()->all(),'id','name'),
            'options' => ['placeholder' => 'Select category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Category');
        
?>
<?= $form->field($model, 'description')->textArea(['rows'=>5])?>
<?= $form->field($model, 'youtube')->textInput()?>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>