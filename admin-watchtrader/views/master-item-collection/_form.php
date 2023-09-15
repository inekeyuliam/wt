<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\HighlightBrands;
use app\models\MasterItems;
use app\models\MasterCollections;

$this->title = "Item Collection";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Item Collection</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?=
  
        $form->field($model, 'collection_id')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(MasterCollections::find()->where(['flag'=>1])->all(),'id','name'),
            'options' => ['placeholder' => 'Select collection ...', 'id'=>'collection_id'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Collection');
        
?>
<?=
  
        $form->field($model, 'item_id')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(MasterItems::find()->where(['flag'=>1])->all(),'id','nama'),
            'options' => ['placeholder' => 'Select item ...', 'id'=>'master_item'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Item');
        
?>
<br>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>
