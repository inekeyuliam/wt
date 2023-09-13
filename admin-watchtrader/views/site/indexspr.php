<?php

  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use yii\helpers\Url;
  use yii\grid\GridView;
  use yii\widgets\Pjax;
  use richardfan\widget\JSRegister;
/* @var $this yii\web\View */

  $this->title = 'Watches Trader';

  if( Yii::$app->user->identity->job == 0 ){

    // ['label' => 'City', 'url' => ['/master-city']],
    // ['label' => 'Country', 'url' => ['/master-country']],
    // ['label' => 'Grade', 'url' => ['/master-grade']],
    // ['label' => 'School', 'url' => ['/master-school']],
    // ['label' => 'Level', 'url' => ['/master-level']],
    // ['label' => 'Level Interest', 'url' => ['/master-levelinterest']],
    // ['label' => 'Major Interest', 'url' => ['/master-majorinterest']],
    // ['label' => 'Lead Source', 'url' => ['/master-leadsource']],
    // ['label' => 'VE Program', 'url' => ['/master-englishcourseprogram']],
    // ['label' => 'VE Type Class', 'url' => ['/master-englishcourseclasstype']],

  ?>


  <?php
    echo  Html::a('Master City', ['../master-city'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo  Html::a('Master Country', ['../master-country'], ['class' => 'btn btn-success','style'=>'margin-left:55px;']) ;
    echo  Html::a('Master Lead Source', ['../master-leadsource'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo "<br>";
    echo "<br>";
    echo  Html::a('Master Grade', ['../master-grade'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo  Html::a('Master School', ['../master-school'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo  Html::a('Master Level', ['../master-level'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo "<br>";
    echo "<br>";
    echo  Html::a('Level Interest', ['../master-levelinterest'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo  Html::a('Major Interest', ['../master-majorinterest'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo "<br>";
    echo "<br>";
    echo  Html::a('Master VE Program', ['../master-englishcourseprogram'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;
    echo  Html::a('Master VE Type Class', ['../master-englishcourseclasstype'], ['class' => 'btn btn-success','style'=>'margin-left:10px;']) ;

  }


?>
