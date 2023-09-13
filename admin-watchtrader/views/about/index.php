<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

$this->title = "About";
?>
<div class="row">
    <div class="col-md-12">
        <h3>About</h3>       
    </div>
</div>
<div class="row" >
    <div class="col-md-12">
        <div class="list-group">
		<?php if (count($model) < 1) { ?>
        <?= Html::a('Set About', ['about/create'], ['class' => 'btn btn-success']); ?>
        </div>
		<?php } ?>
    </div>
	<?php foreach ($model as $data): ?>
	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'content_short')->textarea(['disabled' => true, 'rows'=>18]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'content_long')->textarea(['disabled' => true, 'rows'=>18]); ?>
		</div>
	</div>
	<?php ActiveForm::end(); ?>	
			<a class="btn btn-warning btn-sm" href="<?php echo Url::to(['about/edit?id='.$data['id']]); ?>"><i class="glyphicon glyphicon-edit"></i> Edit </a> 
	<?php endforeach; ?>
</div>
</div>
