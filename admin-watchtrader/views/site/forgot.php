<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Watches Trader</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Forgot Password</p>

        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'email')->textInput()
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

            <!-- <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?> -->

            <div class="form-group"">
                <div class="col-lg-12 text-right">
                    <?= Html::a('Back', ['/site/login'], ['class' => 'btn btn-secondary']) ?>
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.card-body -->
  </div>
