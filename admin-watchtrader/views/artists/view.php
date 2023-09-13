<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\artists;
use app\models\MasterPosition;

/* @var $this yii\web\View */
/* @var $model app\models\MasterUser */

$this->title = 'Artists';
$this->params['breadcrumbs'][] = ['label' => 'Master Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-user-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          
        
            'name',
            'profile',

			[

				'attribute' => 'img',
				'format' => 'html',
				'label' => 'Image',
	
				'value' => function ($data) {
	
					return Html::img('../../../data/artists/' . $data['image'],
	
						['width' => '60px']);
	
				},
	
			],

        ],
    ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

</div>
