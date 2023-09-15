<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\MasterCollections;
use app\models\MasterItems;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Collection';
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

				'attribute' => 'collection_id',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'collection_id',
                    'data' => ArrayHelper::map(MasterCollections::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => ' '],
                            'language' => 'en',
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                ]),
				'value' => function ($data) {
	
					return $data->collection->name;
	
				},
	
			],
            [
                'label'=>'Item',
				'attribute' => 'item_id',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'item_id',
                    'data' => ArrayHelper::map(MasterItems::find()->all(), 'id', 'nama'),
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
