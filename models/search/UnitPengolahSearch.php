<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnitPengolah;

/**
 * UnitPengolahSearch represents the model behind the search form about `app\models\UnitPengolah`.
 */
class UnitPengolahSearch extends UnitPengolah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama_pengolah', 'keterangan'], 'safe'],
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
        $query = UnitPengolah::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->andFilterWhere(['kode' => $this->kode]);

        // grid filtering conditions
        $query->andFilterWhere(['like', 'nama_pengolah', $this->nama_pengolah])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
