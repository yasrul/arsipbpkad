<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LokRak;

/**
 * LokRakSearch represents the model behind the search form about `app\models\LokRak`.
 */
class LokRakSearch extends LokRak
{
    public $namaRuang;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'kd_ruang','namaRuang', 'nama_rak'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LokRak::find()->joinWith('ruang');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['namaRuang'] = [
            'asc'=>['lok_ruang.nama_ruang'=>SORT_ASC],
            'desc'=>['lok_ruang.nama_ruang'=>SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'kode', $this->kode])
            //->andFilterWhere(['like', 'kd_ruang', $this->kd_ruang])
            ->andFilterWhere(['like', 'lok_ruang.nama_ruang', $this->namaRuang])
            ->andFilterWhere(['like', 'nama_rak', $this->nama_rak]);

        return $dataProvider;
    }
}
