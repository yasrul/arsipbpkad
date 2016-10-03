<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArsipInaktif;

/**
 * Description of Laporan
 *
 * @author yasrul
 */
class LaporanForm extends Model {

    public $unitPemilik;
    public $unitPengolah;
    public $ymDpa1;
    public $ymDpa2;
    public $ketDpa;


    public function attributeLabels() {
        return [
            'unitPemilik' => 'Unit Pemilik',
            'unitPengolah' => 'Unit Pengolah',
            'ymDpa1' => 'Bulan-Tahun DPA Awal',
            'ymDpa2' => 'Bulan-Tahun DPA Akhir',
        ];
    }
    
    public function rules() {
        return [
            [['unitPemilik','unitPengolah','ketDpa'], 'string'],
            [['ymDpa1','ymDpa2'], 'required'],
            [['ymDpa1','ymDpa2'], 'date'],
            [['no_def','kd_masalah','uraian'], 'safe']
        ];
    }
    
    public function search($params) {
        $query = ArsipInaktif::find()->joinWith(['pemilik','pengolah','dpa']);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        $this->load($params);
        
        $query->andFilterWhere(['like','unit_pemilik.nama_instansi', $this->unitPemilik])
                ->andFilterWhere(['like', 'unit_pengolah.nama_pengolah', $this->unitPengolah])
                ->andWhere(['>=', 'dpa_ref.tahun_bulan', $this->ymDpa1])
                ->andWhere(['<=', 'dpa_ref.tahun_bulan', $this->ymDpa2]);
        
       
        return $dataProvider;
    }
}
