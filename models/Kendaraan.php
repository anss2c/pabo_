<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kendaraan".
 *
 * @property string $noPolisi
 * @property string $merkKendaraan
 * @property string $jenisKendaraan
 * @property string $tipeKendaraan
 * @property string $tahun
 * @property string $noMesin
 * @property string $noRangka
 */
class Kendaraan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kendaraan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['noPolisi', 'merkKendaraan', 'jenisKendaraan', 'tipeKendaraan', 'tahun', 'noMesin', 'noRangka'], 'required'],
            [['tahun'], 'safe'],
            [['noPolisi'], 'string', 'max' => 10],
            [['merkKendaraan'], 'string', 'max' => 100],
            [['jenisKendaraan', 'tipeKendaraan'], 'string', 'max' => 50],
            [['noMesin', 'noRangka'], 'string', 'max' => 20],
            [['noPolisi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'noPolisi' => 'No Polisi',
            'merkKendaraan' => 'Merk Kendaraan',
            'jenisKendaraan' => 'Jenis Kendaraan',
            'tipeKendaraan' => 'Tipe Kendaraan',
            'tahun' => 'Tahun',
            'noMesin' => 'No Mesin',
            'noRangka' => 'No Rangka',
        ];
    }
}
