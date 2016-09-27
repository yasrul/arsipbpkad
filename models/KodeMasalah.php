<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kode_masalah".
 *
 * @property string $kode
 * @property string $masalah
 * @property string $keterangan
 */
class KodeMasalah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kode_masalah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'masalah', 'keterangan'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['masalah', 'keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'masalah' => 'Masalah',
            'keterangan' => 'Keterangan',
        ];
    }
}
