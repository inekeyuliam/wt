<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Brands;
use app\models\MasterBrands;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MasterUser */

$this->title = 'Brands';
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
                'filter' => ArrayHelper::map(MasterBrands::find()->all(), 'id', 'nama'),
				'value' => function ($data) {
	
					return $data->brand->nama;
	
				},
	
			],

        ],
    ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

</div>
