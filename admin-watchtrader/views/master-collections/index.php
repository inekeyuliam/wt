<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\MasterBranch;
use app\models\Brands;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Product';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'No'],

            'name',

			[

				'attribute' => 'brandid',
                'filter' => ArrayHelper::map(Brands::find()->all(), 'id', 'name'),

				'value' => function ($data) {
	
					return $data->brand->name;
	
				},
	
			],
            [

				'attribute' => 'categoryid',
                'filter' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
				'value' => function ($data) {
	
					return $data->category->name;
	
				},
	
			],
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:100px;text-align:center']],
        ],
    ]); ?>


</div>
