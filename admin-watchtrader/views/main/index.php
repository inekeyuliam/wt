<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

$this->title = "Main";
?>
<div class="row">
    <div class="col-md-12">
        <h3>Main</h3>       
    </div>
</div>

<div class="row" >
    <div class="col-md-12">
        <div class="list-group">
		<?php if (count($model) < 1) { ?>
        <?= Html::a('Set Main', ['main/create'], ['class' => 'btn btn-success']); ?>
        </div>
		<?php } ?>
    </div>
	<?php foreach ($model as $data): ?>
	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($data, 'title')->input('title', ['disabled' => true]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= $form->field($data, 'subtitle')->textarea(['disabled' => true, 'rows'=>3]) ?>
		</div>
	</div>
	<?php echo '<b>Video</b><br><video width="320" height="50%" controls autoplay><source  type="video/mp4" src="../../../data/main/'. $data->video.'" class=" img-responsive" width="20%" height="20%" ></video>'?><br><br>

	<?php ActiveForm::end(); ?>	
			<a class="btn btn-warning btn-sm" href="<?php echo Url::to(['main/edit?id='.$data['id']]); ?>"><i class="glyphicon glyphicon-edit"></i> Edit </a> 
	<?php endforeach; ?>
</div>
</div>
