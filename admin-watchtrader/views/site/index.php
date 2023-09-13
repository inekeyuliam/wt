
<style>
  
  tr:nth-child(even) {background-color: #f1f2dc;}
  .btn-link label{
    cursor:pointer;
  }

  .ripple{
	position: relative; /*Position relative is required*/
	height: 100%;
  color:#404040;
	width: 100%;
	display: block;
	outline: none;
	padding: 20px;
	background: linear-gradient(135deg, #ededed 0%,#ededed 100%);
	box-sizing: border-box;
	text-align: center;
	line-height: 14px;
	letter-spacing: 1px;
	text-decoration: none;
	/* box-shadow: 0 2px 1px rgba(0, 0, 0, 0.3); */
	cursor: pointer;
  border-radius:5pt;
	overflow:hidden;
}

.ripple:hover:before{
	animation: ripple 1.2s ease;
}

.ripple:before{
	content:"";
	position:absolute; top:0; left:0;
	width:100%; height:100%;
  background-color:rgba(219, 219, 219, 0.6);
  border-radius:10%;
	transform:scale(0);
}

@keyframes ripple{
	from{transform:scale(0); opacity:0.8;}
	to{transform:scale(4);opacity:0;}
}

.progress {
  margin: 10px auto;
  position: relative;
  width: 90%;
}
.bar {
  background: #008DE6;
  height: 20px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  transition: width 0.3s ease 0s;
  width: 0;
}
.percent {
  color: #333;
  left: 48%;
  position: absolute;
  top: 0;
}


</style>
<?php

  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use yii\helpers\Url;
  use yii\grid\GridView;
  use yii\widgets\Pjax;
  use richardfan\widget\JSRegister;
  use app\models\Customer;
  use app\models\MasterBintang;
  use app\models\MasterBooth;
  use app\models\CustomerMajor;
  use app\models\Followup;
  use app\models\History;
  use app\models\MasterBranch;
  use app\models\MasterUser;
  use app\models\MasterDocumenttype;
  use app\models\MasterTarget;
  
/* @var $this yii\web\View */
  $this->title = 'Watches Trader ';
  \yii\web\YiiAsset::register($this);
?>
    
    <center> <h1>Welcome to Watches Trader </h1> </center>
    <br>



<?php ?>  
