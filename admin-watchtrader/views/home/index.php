<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

$this->title = "Home";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Home</h3>       
    </div>
</div>
<div class="row" >
    <div class="col-md-12">
        <div class="list-group">
		<?php if (count($model) < 1) { ?>
        <?= Html::a('Set Home', ['home/create'], ['class' => 'btn btn-success']); ?>
        </div>
		<?php } ?>
    </div>
	<?php foreach ($model as $data): ?>
	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'youtube_title')->textarea(['disabled' => true, 'rows'=>2]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'youtube_url')->textarea(['disabled' => true, 'rows'=>2]); ?>
		</div>
	</div>
	<?php ActiveForm::end(); ?>	
			<a class="btn btn-warning btn-sm" href="<?php echo Url::to(['home/edit?id='.$data['id']]); ?>"><i class="glyphicon glyphicon-edit"></i> Edit </a> 
	<?php endforeach; ?>
</div>
</div>
