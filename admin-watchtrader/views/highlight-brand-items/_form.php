<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\HighlightBrands;
use app\models\MasterItems;

$this->title = "Highlighted Item";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Highlighted Item</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?=
  
        $form->field($model, 'highlighted_brand_id')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(HighlightBrands::find()->where(['flag'=>1])->all(),'id','name'),
            'options' => ['placeholder' => 'Select brand ...', 'id'=>'brand_id'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Brand');
        
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
<script>
$(document).ready(function() {
    var itemDropdown = $('#master_item'); // Get the item_id dropdownv
  
   
    $('#brand_id').on('change', function() {
        var brandId = $(this).val(); // Get the selected brand_id
        itemDropdown.val('').trigger('change');
       
        $.ajax({
            url: 'get-items', // Replace with the actual URL to fetch items
            type: 'GET',
            data: { brandId: brandId },
            success: function(data) {
                $('#master_item').empty(); // Clear existing options
                var obj = JSON.parse(data);
                console.log(obj)
                itemDropdown.empty(); // Clear existing options

                itemDropdown.append($('<option>', {
                    value: '',
                    text: 'Select item ...'
                }));
                $.each(obj, function(id, name) {
                    itemDropdown.append($('<option>', {
                        value: id,
                        text: name
                    }));
                });

            }
        });
    });
   
});

</script>