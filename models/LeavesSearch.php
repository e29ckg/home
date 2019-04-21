<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Leaves;

/**
 * LeavesSearch represents the model behind the search form of `app\models\Leaves`.
 */
class LeavesSearch extends Leaves
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['date_write', 'catalog_name', 'due', 'date_start', 'date_end', 'date_total', 'dateOld_start', 'dateOld_end', 'dateOld_total', 'address', 'vtotal_a', 'vtotal_b', 'vtotal_c'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Leaves::find();

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
            'user_id' => $this->user_id,
            'date_write' => $this->date_write,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'dateOld_start' => $this->dateOld_start,
            'dateOld_end' => $this->dateOld_end,
        ]);

        $query->andFilterWhere(['like', 'catalog_name', $this->catalog_name])
            ->andFilterWhere(['like', 'due', $this->due])
            ->andFilterWhere(['like', 'date_total', $this->date_total])
            ->andFilterWhere(['like', 'dateOld_total', $this->dateOld_total])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'vtotal_a', $this->vtotal_a])
            ->andFilterWhere(['like', 'vtotal_b', $this->vtotal_b])
            ->andFilterWhere(['like', 'vtotal_c', $this->vtotal_c]);

        return $dataProvider;
    }
}
