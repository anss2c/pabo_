<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property string $idKaryawan
 * @property string $namaKaryawan
 * @property string $departemen
 * @property string $noTelepon
 * @property string $email
 * @property string $alamat
 */
class Karyawan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idKaryawan', 'namaKaryawan', 'departemen', 'noTelepon', 'email', 'alamat'], 'required'],
            [['idKaryawan'], 'string', 'max' => 10],
            [['namaKaryawan', 'alamat'], 'string', 'max' => 200],
            [['departemen'], 'string', 'max' => 50],
            [['noTelepon'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['idKaryawan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idKaryawan' => 'Id Karyawan',
            'namaKaryawan' => 'Nama Karyawan',
            'departemen' => 'Departemen',
            'noTelepon' => 'No Telepon',
            'email' => 'Email',
            'alamat' => 'Alamat',
        ];
    }
}
