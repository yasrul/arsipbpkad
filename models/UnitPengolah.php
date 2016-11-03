<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['unit_pengolah'], 'required'],
            [['kode'], 'integer'],
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
            'unit_pengolah' => 'Pengolah',
            'keterangan' => 'Keterangan',
        ];
    }
    
    public static function getListPengolah() {
        $droptions = UnitPengolah::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'nama_pengolah');
    }
}
