<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dpa_ref".
 *
 * @property string $kode
 * @property string $tahun_bulan
 * @property string $keterangan
 */
class DpaRef extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dpa_ref';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'tahun_bulan', 'keterangan'], 'required'],
            [['tahun_bulan'], 'safe'],
            [['kode'], 'string', 'max' => 10],
            [['keterangan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'tahun_bulan' => 'Tahun Bulan',
            'keterangan' => 'Keterangan',
        ];
    }
    
    public static function getListDpa() {
        $droptions = DpaRef::find()->select('kode, keterangan')->orderBy('tahun_bulan Desc')->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'keterangan');
    }
    
    public static function getYmDpa() {
        $droptions = DpaRef::find()->select(['kode','concat(upper(monthname(tahun_bulan))," ",year(tahun_bulan)) as thnbln'])
                ->orderBy('tahun_bulan desc')->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'thnbln');
    }
}
