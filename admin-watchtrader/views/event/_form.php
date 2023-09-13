<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAkta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-bank-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="clearfix"></div> <br>
        

        <div class="col-md-12">
            <?= $form->field($model, 'title')->textInput() ?>
            <?= $form->field($model, 'eventdate')->textInput() ?>
            <?= $form->field($model, 'location')->textInput() ?>
            <?= $form->field($model, 'description')->textArea(['rows'=>10]) ?>
            <?= $form->field($model, 'publishdate')->widget(\yii\jui\DatePicker::className(),
            [ 'dateFormat' => 'php:Y-m-d',
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-50:-12',
                'altFormat' => 'yy-mm-dd',
            ]],['placeholder' => 'yy/mm/dd'])
            ->textInput(['placeholder' => \Yii::t('app', 'mm/dd/yyyy')]) ;?>           

        </div>


    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function checkOption(name){
        // alert(name);
    }
</script>
