<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\MasterBrands;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Highlighted Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'No'],

            
			[

				'attribute' => 'brand_id',
                'filter' => ArrayHelper::map(MasterBrands::find()->all(), 'id', 'nama'),
				'value' => function ($data) {
	
					return $data->brand->nama;
	
				},
	
			],
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:100px;text-align:center']],
        ],
    ]); ?>


</div>
