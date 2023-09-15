<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\MasterItems;
use app\models\MasterBrands;
/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAkta */

$this->title = 'Detail Product';
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-bank-view">

    <h1><?= Html::encode($this->title) ?></h1><br>

  
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Item',
				'attribute' => 'id',
                'filter' => ArrayHelper::map(MasterItems::find()->all(), 'id', 'nama'),
				'value' => function ($data) {
	
					return $data->nama;
	
				},
	
			],
            'kode_barang',
            [

				'attribute' => 'id_master_jenis',
                'filter' => ArrayHelper::map(MasterBrands::find()->all(), 'id', 'nama'),
				'value' => function ($data) {
	
					return $data->brand->nama;
	
				},
	
			],
           
        ],
    ]) ?>
    <br>
    <?php $t = "add-image?id=".$model->id;?>
        <div class="row">
            <div class="col-md-1">
                <?= Html::a('Add Image', $t, ['class' => 'btn btn-success']) ?><br><br>
            </div>
            <div class="col-md-2">
            <?= Html::a('View Images', 'view-image?id='.$model->id, ['class' => 'btn btn-info']) ?><br><br>
            </div>
        </div>
        <div class="row">
        <?php foreach($modelImage as $image){?>
            <?php echo '<div class="col-md-3">
                <img src="../../../data/products/'.$image->image.'" style="width:200px;" />
            </div>'?>
        <?php }?>
        </div>
</div>
