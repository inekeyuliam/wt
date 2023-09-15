<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_jenis_akta".
 *
 * @property int $id
 * @property int $tipe_dokumen 1:ppat, 2:notaris
 * @property string $kode
 * @property string $nama
 * @property string $keterangan
 * @property string $ktp 0:tidak perlu, 1:wajib, 2:opsional
 * @property string|null $ktp_option wajib / perorangan
 * @property string|null $ktp_catatan
 * @property string|null $kk 0:tidak perlu, 1:wajib, 2:opsional
 * @property string|null $kk_option
 * @property string|null $kk_catatan
 * @property string|null $akta_kematian
 * @property string|null $akta_kematian_option
 * @property string|null $akta_kematian_catatan
 * @property string|null $penetapan_pengadilan
 * @property string|null $penetapan_pengadilan_option
 * @property string|null $penetapan_pengadilan_catatan
 * @property string|null $akta_lahir
 * @property string|null $akta_lahir_option
 * @property string|null $akta_lahir_catatan
 * @property string|null $akta_nikah
 * @property string|null $akta_nikah_option
 * @property string|null $akta_nikah_catatan
 * @property string|null $npwp
 * @property string|null $npwp_option
 * @property string|null $npwp_catatan
 * @property string|null $pbb
 * @property string|null $pbb_option
 * @property string|null $pbb_catatan
 * @property string|null $pbb_tunggak
 * @property string|null $pbb_tunggak_option
 * @property string|null $pbb_tunggak_catatan
 * @property string|null $nib_oss
 * @property string|null $nib_oss_option
 * @property string|null $nib_oss_catatan
 * @property string|null $ijin_lokasi
 * @property string|null $ijin_lokasi_option
 * @property string|null $ijin_lokasi_catatan
 * @property string|null $email
 * @property string|null $email_option
 * @property string|null $email_catatan
 * @property string|null $surat_order
 * @property string|null $surat_order_option
 * @property string|null $surat_order_catatan
 * @property string|null $pk_bawah_tangan
 * @property string|null $pk_bawah_tangan_option
 * @property string|null $pk_bawah_tangan_catatan
 * @property string|null $jaminan
 * @property string|null $jaminan_option
 * @property string|null $jaminan_catatan
 * @property string|null $lampiran_surat
 * @property string|null $lampiran_surat_option
 * @property string|null $lampiran_surat_catatan
 * @property string $timestamp
 */
class MasterItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[
                'nama',
                'kode_barang',
            ], 'string', 'max' => 255],
            [['id_master_jenis'],'integer']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama' => 'Nama',
            'kode_barang' => 'Kode',
            'id_master_jenis' => 'Brand'
        ];
    }
    public function getBrand()
    {
        return $this->hasOne(MasterBrands::classname(), ['id' => 'id_master_jenis']);
    }
}
