<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterJenisAktaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dealers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dealer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'address',
            'city',
            'phone',
            'email',
            'website',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px; white-space: normal;'],
            ],
        ],
    ]); ?>


</div>
