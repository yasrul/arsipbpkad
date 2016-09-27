<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arsip_inaktif".
 *
 * @property integer $id
 * @property string $no_def
 * @property string $kd_masalah
 * @property string $kd_pemilik
 * @property string $kd_pengolah
 * @property string $uraian
 * @property string $kurun_waktu
 * @property string $kd_ruang
 * @property string $kd_rak
 * @property string $no_box
 * @property string $kd_dpa
 */
class ArsipInaktif extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arsip_inaktif';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_def', 'kd_masalah', 'kd_pemilik', 'kd_pengolah', 'uraian', 'kurun_waktu', 'kd_dpa'], 'required'],
            [['no_def', 'kd_masalah', 'kd_pemilik', 'kd_pengolah', 'kd_ruang', 'kd_rak', 'kd_dpa'], 'string', 'max' => 10],
            [['uraian'], 'string', 'max' => 255],
            [['kurun_waktu'], 'string', 'max' => 50],
            [['no_box'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_def' => 'No Def',
            'kd_masalah' => 'Kode Masalah',
            'kd_pemilik' => 'Kd Pemilik',
            'kd_pengolah' => 'Kd Pengolah',
            'uraian' => 'Uraian',
            'kurun_waktu' => 'Kurun Waktu',
            'kd_ruang' => 'Kd Ruang',
            'kd_rak' => 'Kd Rak',
            'no_box' => 'No Box',
            'kd_dpa' => 'Kd Dpa',
        ];
    }
    
    public function getMasalah() {
        return $this->hasOne(KodeMasalah::className(), ['kode'=>'kd_masalah']);
    }
    
    public function getPemilik() {
        return $this->hasOne(UnitPemilik::className(), ['kode'=>'kd_pemilik']) ;
    }
    
    public function getPengolah() {
        return $this->hasOne(UnitPengolah::className(), ['kode'=>'kd_pengolah']);
    }
    
    public function getRuang() {
        return $this->hasOne(LokRuang::className(), ['kode'=>'kd_ruang']);
    }
    
    public function getRak() {
        return $this->hasOne(LokRak::className(), ['kode'=>'kd_rak']);
    }
    
    public function getDpa() {
        return $this->hasOne(DpaRef::className(), ['kode'=>'kd_dpa']);
    }
}
