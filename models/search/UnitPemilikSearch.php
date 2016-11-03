<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnitPemilik;

/**
 * UnitPemilikSearch represents the model behind the search form about `app\models\UnitPemilik`.
 */
class UnitPemilikSearch extends UnitPemilik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama_instansi'], 'safe'],
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
        $query = UnitPemilik::find();

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
        $query->andFilterWhere(['like', 'nama_instansi', $this->nama_instansi]);

        return $dataProvider;
    }
}
