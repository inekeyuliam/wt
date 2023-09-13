<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterJenisAktaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'indexorder',
            'title',
            [
                'attribute' => 'image',
                'format' => 'html',    
                'contentOptions' => ['style'=>'text-align: center;'],
                'headerOptions' => ['style'=>'text-align: center;'],

                'value' => function ($data) {
                    return Html::img('../../../data/products/'. $data['image'],
                        ['width' => '100px']);
                },
            ],
            'url',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
