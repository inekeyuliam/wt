<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = 'History Customer ';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    table{
        text-align:center;
    }
</style>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?> <label for="" style='color:red'><?= $model->fullname ?></label> </h1>

    <div class="table">
        <table class="table">
            <thead>

                <th style='width:10%;text-align:center'> No</th>
                <th style='width:20%;text-align:center'> Step</th>
                <th style='width:20%;text-align:center'>Action</th>
                <th style='width:20%;text-align:center'> Date Time</th>
            </thead>
            <tbody>

                <?php 
                    $no=1;
                    foreach($history_list as $h){
                        echo "<tr><td>$no</td>"."<td>".$h['status_step']."</td>"."<td>".$h['history_action']."</td>"."<td>".date('d F Y, H:i',strtotime($h['created_at']))."</td>"."</tr>";
                        $no++;
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>
