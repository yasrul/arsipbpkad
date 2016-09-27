<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lok_ruang".
 *
 * @property string $kode
 * @property string $nama_ruang
 * @property string $keterangan
 *
 * @property LokRak[] $lokRaks
 */
class LokRuang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lok_ruang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama_ruang'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['nama_ruang'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'nama_ruang' => 'Nama Ruang',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokRaks()
    {
        return $this->hasMany(LokRak::className(), ['kd_ruang' => 'kode']);
    }
}
