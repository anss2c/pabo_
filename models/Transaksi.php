<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property string $idPengajuan
 * @property string $idKaryawan
 * @property string $tglPengajuan
 * @property string $noPolisi
 * @property string $tempatServis
 * @property string $tanggalServis
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPengajuan', 'idKaryawan', 'tglPengajuan', 'noPolisi', 'tempatServis', 'tanggalServis'], 'required'],
            [['tglPengajuan', 'tanggalServis'], 'safe'],
            [['idPengajuan', 'idKaryawan', 'noPolisi'], 'string', 'max' => 10],
            [['tempatServis'], 'string', 'max' => 200],
            [['idPengajuan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPengajuan' => 'Id Pengajuan',
            'idKaryawan' => 'Id Karyawan',
            'tglPengajuan' => 'Tgl Pengajuan',
            'noPolisi' => 'No Polisi',
            'tempatServis' => 'Tempat Servis',
            'tanggalServis' => 'Tanggal Servis',
        ];
    }
}
