<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\MasterBranch;
use app\models\MasterPosition;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'No'],

            'name',
            'username',
            'telp',
            'email',
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:100px;text-align:center']],
        ],
    ]); ?>


</div>
