<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit_pengolah".
 *
 * @property string $kode
 * @property string $unit_pengolah
 * @property string $keterangan
 */
class UnitPengolah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_pengolah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'unit_pengolah'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['unit_pengolah', 'keterangan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'unit_pengolah' => 'Unit Pengolah',
            'keterangan' => 'Keterangan',
        ];
    }
}
