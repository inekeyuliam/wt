<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

$this->title = "Config";
?>

<div class="row" >
    <div class="col-md-12">
        <div class="list-group">
		<?php if (count($model) < 1) { ?>
        <?= Html::a('Set Config', ['config/create'], ['class' => 'btn btn-success']); ?>
        </div>
		<?php } ?>
    </div>
	<?php foreach ($model as $data): ?>
	<?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'meta_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'meta_author')->textInput(['disabled' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'meta_copyright')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'meta_keywords')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'meta_description')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'googleanalytics')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'sidebar_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'sidebar_description')->textInput(['disabled' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_about_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_about_subtitle')->textInput(['disabled' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_newarrivals_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_newarrivals_subtitle')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_latestevent_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_latestevent_subtitle')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_artists_title')->textInput(['disabled' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_artists_subtitle')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_dealers_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_dealers_subtitle')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_contact_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_contact_subtitle')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_contact_formtitle')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_followus_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'menu_office_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'link_scrolldown_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'link_backtotop_title')->textInput(['disabled' => true])?>
		</div>
	</div>
	<?php ActiveForm::end(['disabled' => true]); ?>	
			<a class="btn btn-warning btn-sm" href="<?php echo Url::to(['config/edit?id='.$data['id']]); ?>"><i class="glyphicon glyphicon-edit"></i> Edit Data</a> 
	<?php endforeach; ?>
</div>
</div>
