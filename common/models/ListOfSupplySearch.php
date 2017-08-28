<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ListOfSupply;

/**
 * ListOfSupplySearch represents the model behind the search form about `common\models\ListOfSupply`.
 */
class ListOfSupplySearch extends ListOfSupply
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'supply_type_id', 'unit_of_measurement_id', 'weight'], 'integer'],
            [['name', 'date_expiration', 'date_received', 'description', 'timestamp', 'barangay_id', 'temperature_requirement', 'texture', 'is_sensitive'], 'safe'],
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
        $query = ListOfSupply::find();

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
            'code' => $this->code,
            'supply_type_id' => $this->supply_type_id,
            'unit_of_measurement_id' => $this->unit_of_measurement_id,
            'weight' => $this->weight,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'date_expiration', $this->date_expiration])
            ->andFilterWhere(['like', 'date_received', $this->date_received])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'barangay_id', $this->barangay_id])
            ->andFilterWhere(['like', 'temperature_requirement', $this->temperature_requirement])
            ->andFilterWhere(['like', 'texture', $this->texture])
            ->andFilterWhere(['like', 'is_sensitive', $this->is_sensitive]);

        return $dataProvider;
    }
}
