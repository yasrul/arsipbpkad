<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArsipInaktif;

/**
 * ArsipInaktifSearch represents the model behind the search form about `app\models\ArsipInaktif`.
 */
class ArsipInaktifSearch extends ArsipInaktif
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_def', 'kd_masalah', 'kd_pemilik', 'kd_pengolah', 'uraian', 'kurun_waktu', 'kd_ruang', 'kd_rak', 'no_box', 'kd_dpa'], 'safe'],
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
        $query = ArsipInaktif::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'no_def', $this->no_def])
            ->andFilterWhere(['like', 'kd_masalah', $this->kd_masalah])
            ->andFilterWhere(['like', 'kd_pemilik', $this->kd_pemilik])
            ->andFilterWhere(['like', 'kd_pengolah', $this->kd_pengolah])
            ->andFilterWhere(['like', 'uraian', $this->uraian])
            ->andFilterWhere(['like', 'kurun_waktu', $this->kurun_waktu])
            ->andFilterWhere(['like', 'kd_ruang', $this->kd_ruang])
            ->andFilterWhere(['like', 'kd_rak', $this->kd_rak])
            ->andFilterWhere(['like', 'no_box', $this->no_box])
            ->andFilterWhere(['like', 'kd_dpa', $this->kd_dpa]);

        return $dataProvider;
    }
}
