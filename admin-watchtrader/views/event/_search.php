<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterJenisAktaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-bank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'ktp') ?>

    <?php // echo $form->field($model, 'ktp_option') ?>

    <?php // echo $form->field($model, 'ktp_catatan') ?>

    <?php // echo $form->field($model, 'kk') ?>

    <?php // echo $form->field($model, 'kk_option') ?>

    <?php // echo $form->field($model, 'kk_catatan') ?>

    <?php // echo $form->field($model, 'akta_kematian') ?>

    <?php // echo $form->field($model, 'akta_kematian_option') ?>

    <?php // echo $form->field($model, 'akta_kematian_catatan') ?>

    <?php // echo $form->field($model, 'penetapan_pengadilan') ?>

    <?php // echo $form->field($model, 'penetapan_pengadilan_option') ?>

    <?php // echo $form->field($model, 'penetapan_pengadilan_catatan') ?>

    <?php // echo $form->field($model, 'akta_lahir') ?>

    <?php // echo $form->field($model, 'akta_lahir_option') ?>

    <?php // echo $form->field($model, 'akta_lahir_catatan') ?>

    <?php // echo $form->field($model, 'akta_nikah') ?>

    <?php // echo $form->field($model, 'akta_nikah_option') ?>

    <?php // echo $form->field($model, 'akta_nikah_catatan') ?>

    <?php // echo $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'npwp_option') ?>

    <?php // echo $form->field($model, 'npwp_catatan') ?>

    <?php // echo $form->field($model, 'pbb') ?>

    <?php // echo $form->field($model, 'pbb_option') ?>

    <?php // echo $form->field($model, 'pbb_catatan') ?>

    <?php // echo $form->field($model, 'pbb_tunggak') ?>

    <?php // echo $form->field($model, 'pbb_tunggak_option') ?>

    <?php // echo $form->field($model, 'pbb_tunggak_catatan') ?>

    <?php // echo $form->field($model, 'nib_oss') ?>

    <?php // echo $form->field($model, 'nib_oss_option') ?>

    <?php // echo $form->field($model, 'nib_oss_catatan') ?>

    <?php // echo $form->field($model, 'ijin_lokasi') ?>

    <?php // echo $form->field($model, 'ijin_lokasi_option') ?>

    <?php // echo $form->field($model, 'ijin_lokasi_catatan') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'email_option') ?>

    <?php // echo $form->field($model, 'email_catatan') ?>

    <?php // echo $form->field($model, 'surat_order') ?>

    <?php // echo $form->field($model, 'surat_order_option') ?>

    <?php // echo $form->field($model, 'surat_order_catatan') ?>

    <?php // echo $form->field($model, 'pk_bawah_tangan') ?>

    <?php // echo $form->field($model, 'pk_bawah_tangan_option') ?>

    <?php // echo $form->field($model, 'pk_bawah_tangan_catatan') ?>

    <?php // echo $form->field($model, 'jaminan') ?>

    <?php // echo $form->field($model, 'jaminan_option') ?>

    <?php // echo $form->field($model, 'jaminan_catatan') ?>

    <?php // echo $form->field($model, 'lampiran_surat') ?>

    <?php // echo $form->field($model, 'lampiran_surat_option') ?>

    <?php // echo $form->field($model, 'lampiran_surat_catatan') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
