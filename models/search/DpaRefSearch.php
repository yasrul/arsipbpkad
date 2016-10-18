<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DpaRef;

/**
 * DpaRefSearch represents the model behind the search form about `app\models\DpaRef`.
 */
class DpaRefSearch extends DpaRef
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'tahun_bulan', 'keterangan'], 'safe'],
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
        $query = DpaRef::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder'=>['tahun_bulan'=>SORT_DESC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
        //    'tahun_bulan' => $this->tahun_bulan,
        ]);*/

        $query->andFilterWhere(['like', 'kode', $this->kode])
                ->andFilterWhere(['like', 'tahun_bulan', $this->tahun_bulan])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
