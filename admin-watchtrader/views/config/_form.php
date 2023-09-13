<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = "Config";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Config</h3>
        <hr/>
       
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'meta_title')->textInput()?>
<?= $form->field($model, 'meta_author')->textInput()?>
<?= $form->field($model, 'meta_copyright')->textInput()?>
<?= $form->field($model, 'meta_keywords')->textInput()?>
<?= $form->field($model, 'meta_description')->textInput()?>
<?= $form->field($model, 'googleanalytics')->textInput()?>
<?= $form->field($model, 'sidebar_title')->textInput()?>
<?= $form->field($model, 'sidebar_description')->textInput()?>
<?= $form->field($model, 'menu_about_title')->textInput()?>
<?= $form->field($model, 'menu_about_subtitle')->textInput()?>
<?= $form->field($model, 'menu_newarrivals_title')->textInput()?>
<?= $form->field($model, 'menu_newarrivals_subtitle')->textInput()?>
<?= $form->field($model, 'menu_latestevent_title')->textInput()?>
<?= $form->field($model, 'menu_latestevent_subtitle')->textInput()?>
<?= $form->field($model, 'menu_artists_title')->textInput()?>
<?= $form->field($model, 'menu_artists_subtitle')->textInput()?>
<?= $form->field($model, 'menu_dealers_title')->textInput()?>
<?= $form->field($model, 'menu_dealers_subtitle')->textInput()?>
<?= $form->field($model, 'menu_contact_title')->textInput()?>
<?= $form->field($model, 'menu_contact_subtitle')->textInput()?>
<?= $form->field($model, 'menu_contact_formtitle')->textInput()?>
<?= $form->field($model, 'menu_followus_title')->textInput()?>
<?= $form->field($model, 'menu_office_title')->textInput()?>
<?= $form->field($model, 'link_scrolldown_title')->textInput()?>
<?= $form->field($model, 'link_backtotop_title')->textInput()?>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>


<?php ActiveForm::end(); ?>