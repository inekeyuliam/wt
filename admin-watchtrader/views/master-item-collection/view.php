<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Brands;
use app\models\MasterHighlightedBrands;
use app\models\MasterItems;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MasterUser */

$this->title = 'Item';
$this->params['breadcrumbs'][] = ['label' => 'Master Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-user-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          
          
			[

				'attribute' => 'brand_id',
                'filter' => ArrayHelper::map(MasterHighlightedBrands::find()->all(), 'id', 'nama'),
				'value' => function ($data) {
	
					return $data->brand->nama;
	
				},
	
			],
            [

				'attribute' => 'item_id',
                'filter' => ArrayHelper::map(MasterItem::find()->all(), 'id', 'nama'),
				'value' => function ($data) {
	
					return $data->item->nama;
	
				},
	
			],

        ],
    ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

</div>
