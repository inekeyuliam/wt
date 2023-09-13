<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

$this->title = "Contact";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Contact</h3>       
    </div>
</div>
<div class="row" >
    <div class="col-md-12">
        <div class="list-group">
		<?php if (count($model) < 1) { ?>
        <?= Html::a('Set Contact', ['contact/create'], ['class' => 'btn btn-success']); ?>
        </div>
		<?php } ?>
    </div>
	<?php foreach ($model as $data): ?>
	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'office')->textarea(['disabled' => true, 'rows'=>8]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'googlemaps')->textarea(['disabled' => true, 'rows'=>8]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'phone')->textInput(['disabled' => true]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'whatsapp')->textInput(['disabled' => true]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'email')->textInput(['disabled' => true]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'instagram')->textInput(['disabled' => true]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'facebook')->textInput(['disabled' => true]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'twitter')->textInput(['disabled' => true]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'youtube')->textInput(['disabled' => true]); ?>
		</div>
	</div>
	<?php ActiveForm::end(); ?>	
			<a class="btn btn-warning btn-sm" href="<?php echo Url::to(['contact/edit?id='.$data['id']]); ?>"><i class="glyphicon glyphicon-edit"></i> Edit </a> 
	<?php endforeach; ?>
</div>
</div>
