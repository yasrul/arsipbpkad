<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "unit_pemilik".
 *
 * @property string $kode
 * @property string $nama_instansi
 */
class UnitPemilik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_pemilik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama_instansi'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['nama_instansi'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'nama_instansi' => 'Nama Instansi',
        ];
    }
    
    public static function getListPemilik() {
        $droptions = UnitPemilik::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'nama_instansi');
    }
}
