<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\UploadedFile;

//Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/fileupload/';
//Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/fileupload/';

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
 * @property string $filename
 * @property string $source_file
 */
class ArsipInaktif extends \yii\db\ActiveRecord
{
    public $fileup;
    

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
            [['kd_pemilik','kd_pengolah'], 'integer'],
            [['no_def', 'kd_masalah', 'kd_ruang', 'kd_rak', 'kd_dpa'], 'string', 'max' => 10],
            [['uraian'], 'string', 'max' => 255],
            [['kurun_waktu'], 'string', 'max' => 50],
            [['no_box'], 'string', 'max' => 6],
            [['filename','source_file'], 'safe'],
            [['fileup'], 'file','extensions' => ['jpg','jpeg','png','pdf','zip','rar'],
                'maxSize' => 1024*1024,
                'skipOnEmpty'=>TRUE
            ]
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
            'kd_masalah' => 'Kd Masalah',
            'kd_pemilik' => 'Pemilik',
            'kd_pengolah' => 'Unit Pengolah',
            'uraian' => 'Uraian',
            'linkArsip'=> Yii::t('app', 'ArsipInaktif'),
            'kurun_waktu' => 'Tahun',
            'kd_ruang' => 'Ruang',
            'kd_rak' => 'Rak',
            'no_box' => 'No Box',
            'kd_dpa' => 'DPA',
            'filename' => Yii::t('app','Filename'),
            'source_file' => Yii::t('app','Pathname'),
            'fileup' => Yii::t('app','Upload File'),
        ];
    }
    
    public function getLinkArsip() {
        $url = Url::to(['arsip-inaktif/view', 'id' => $this->id]);
        $option = [];
        return Html::a($this->uraian, $url, $option);
    }
    
    public function getMasalah() {
        return $this->hasOne(KodeMasalah::className(), ['kode'=>'kd_masalah']);
    }
    
    public function getTextMasalah() {
        return $this->kd_masalah.' - '.$this->masalah->masalah;
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
    
    public function getPathFile() {
        return isset($this->source_file) ? Yii::getAlias('@app/fileupload/').$this->source_file : null;
    }
    
    public function getUrlFile() {
        return isset($this->source_file) ? Yii::$app->params['uploadUrl'].$this->source_file : null;
    }

    public function uploadFile() {
        $fileup = UploadedFile::getInstance($this, 'fileup');
        
        if (!isset($fileup)) {
            return FALSE;
        }
        $this->filename = $fileup->name;
        $ext = end((explode(".", $fileup->name)));
        $this->source_file = $this->id.".{$ext}";
        
        return $fileup;
    }
    
    public function deleteFile() {
        $file = $this->getPathFile();
        
        if(empty($file) || !file_exists($file)) {
            return FALSE;
        }
        
        if(!unlink($file)) {
            return FALSE;
        }
        
        $this->filename = null;
        $this->source_file = NULL;
        
        return true;
    }
    
 
}
