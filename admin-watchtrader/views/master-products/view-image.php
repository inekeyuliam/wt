<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\MasterItems;
use app\models\MasterBrands;
/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAkta */

$this->title = 'Detail Product Images';
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-bank-view">

    <h1><?= Html::encode($this->title) ?></h1><br>

  
    <br>
        <?php foreach($model as $mod){?>
            
            <?php 
                $t = 'delete-image?id='.$mod->id;
                $u = 'update-image?id='.$mod->id;

            ?>

            <?php echo '
            <div class="row">
                <div class="col-md-3" style="padding:20px">
                    <img src="../../../data/products/'.$mod->image.'" style="width:200px;" />
                </div>
                <div class="col-md-2" style="padding:50px">
                    '. Html::a("Update Image", $u, ['class' => 'btn btn-primary']) .'<br><br>
                </div>
                <div class="col-md-2" style="padding:50px">
                     '. Html::a("Delete Image", $t, ['class' => 'btn btn-danger']) .'<br><br>
                </div>
            </div>'?>
        <?php }?>
        <?= Html::a('Back', 'view?id='.$modelid, ['class' => 'btn btn-info']) ?><br><br>

</div>
