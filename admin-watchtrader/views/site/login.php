<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$session = Yii::$app->session;
$session->remove('id_booth');

?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Watches Trader</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'password')->passwordInput()
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

            <p class="mb-1">
                <a href="<?= Url::to(['site/forgot']); ?>">I forgot my password</a>
            </p>

            <div class="form-group"">
                <div class="col-lg-12 text-right">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.card-body -->
  </div>
