<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAkta */

$this->title = 'Detail Testimonial';
$this->params['breadcrumbs'][] = ['label' => 'Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-bank-view">

    <h1><?= Html::encode($this->title) ?></h1><br>

  
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'occupation',
            'testimonial',
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img('../../../data/testimonials/'. $data['image'],
                        ['width' => '100px']);
                },
            ],
           
        ],
    ]) ?>
  <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
