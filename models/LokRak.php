<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lok_rak".
 *
 * @property string $kode
 * @property string $kd_ruang
 * @property string $nama_rak
 *
 * @property LokRuang $kdRuang
 */
class LokRak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lok_rak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'kd_ruang', 'nama_rak'], 'required'],
            [['kode', 'kd_ruang'], 'string', 'max' => 10],
            [['nama_rak'], 'string', 'max' => 50],
            [['kd_ruang'], 'exist', 'skipOnError' => true, 'targetClass' => LokRuang::className(), 'targetAttribute' => ['kd_ruang' => 'kode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'kd_ruang' => 'Ruang',
            'nama_rak' => 'Nama Rak',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuang()
    {
        return $this->hasOne(LokRuang::className(), ['kode' => 'kd_ruang']);
    }
    
    public static function getListRak() {
        $droptions = LokRak::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'nama_rak');
    }
}
