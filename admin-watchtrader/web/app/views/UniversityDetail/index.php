<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UniversityDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'University Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create University Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_university',
            'id_level',
            'flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
