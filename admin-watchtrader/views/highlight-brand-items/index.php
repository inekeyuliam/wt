<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\HighlightBrands;
use app\models\MasterItems;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Highlighted';
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

				'attribute' => 'highlighted_brand_id',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'highlighted_brand_id',
                    'data' => ArrayHelper::map(HighlightBrands::find()->where(['flag'=>1])->all(), 'id', 'name'),
                    'options' => ['placeholder' => ' '],
                            'language' => 'en',
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                ]),
                'contentOptions' => ['style' => 'min-width:200px;'],
				'value' => function ($data) {
	
					return $data->highlightbrand->brand->nama;
	
				},
	
			],
            [
                'label'=>'Item',
				'attribute' => 'item_id',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'item_id',
                    'data' => ArrayHelper::map(MasterItems::find()->where(['flag'=>1])->all(), 'id', 'nama'),
                    'options' => ['placeholder' => ' '],
                            'language' => 'en',
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                ]),
				'value' => function ($data) {
	
					return $data->item->nama;
	
				},
	
			],
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:100px;text-align:center']],
        ],
    ]); ?>


</div>
