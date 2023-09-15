<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\MasterItems;
use app\models\MasterBrands;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterJenisAktaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'Item',
				'attribute' => 'id',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'id',
                    'data' => ArrayHelper::map(MasterItems::find()->all(), 'id', 'nama'),
                    'options' => ['placeholder' => ' '],
                    'language' => 'en',
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]),
				'value' => function ($data) {
	
					return $data->nama;
	
				},
	
			],
            'kode_barang',
            [

				'attribute' => 'id_master_jenis',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'id_master_jenis',
                    'data' => ArrayHelper::map(MasterBrands::find()->all(), 'id', 'nama'),
                    'options' => ['placeholder' => ' '],
                            'language' => 'en',
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                ]),
               
				'value' => function ($data) {
	
					return $data->brand->nama;
	
				},
	
			],
            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width: 8.7%'],
            'template' => '{view}',
            'buttons'=>[
                'view' => function ($url, $model) {
                    return Html::a('<button class="btn btn-sm btn-primary">View</button>', $url, [
                                'title' => Yii::t('app', 'View'),
                    ]);
                },
                ],
            ],
        ],
    ]); ?>


</div>
