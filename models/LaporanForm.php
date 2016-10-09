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
    public $dpa;
    public $ketDpa;


    public function attributeLabels() {
        return [
            'unitPemilik' => 'Unit Pemilik',
            'unitPengolah' => 'Unit Pengolah',
            'dpa' => 'Bulan-Tahun DPA',
            'ketDpa'=>'Ket.DPA'
        ];
    }
    
    public function rules() {
        return [
            [['unitPemilik','unitPengolah','dpa','ketDpa'], 'string'],
            [['no_def','kd_masalah','uraian'], 'safe']
        ];
    }
    
    public function search($params = null) {
        $query = ArsipInaktif::find()->joinWith(['pemilik','pengolah','dpa']);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'no_def',
                'kd_masalah',
                'unitPemilik' => [
                    'asc'=>['unit_pemilik.nama_instansi'=>SORT_ASC],
                    'desc'=>['unit_pemilik.nama_instansi'=>SORT_DESC]
                ],
                'uraian' => [
                    'asc'=>['uraian'=>SORT_ASC],
                    'desc'=>['uraian'=>SORT_DESC]
                ],
                'kurun_waktu',
                'unitPengolah' => [
                    'asc' => ['unit_pengolah.nama_pengolah'=>SORT_ASC],
                    'desc' => ['unit_pengolah.nama_pengolah'=>SORT_DESC]
                ],
                'ketDpa' => [
                    'asc'=> ['dpa_ref.keterangan'=>SORT_ASC],
                    'desc'=>['dpa_ref.keterangan'=>SORT_DESC]
                ]
            ],
            'defaultOrder'=>['kurun_waktu'=>SORT_DESC]
        ]);
        
        $this->load($params);
        
        $query->where(['kd_dpa'=>  $this->dpa]);
        
        $query->andFilterWhere(['like','unit_pemilik.nama_instansi', $this->unitPemilik])
                ->andFilterWhere(['like', 'unit_pengolah.nama_pengolah', $this->unitPengolah])
                ->andFilterWhere(['like', 'dpa_ref.keterangan', $this->ketDpa]);
        
       
        return $dataProvider;
    }
    
    
}
