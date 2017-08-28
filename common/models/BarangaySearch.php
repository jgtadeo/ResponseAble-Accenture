<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Barangay;

/**
 * BarangaySearch represents the model behind the search form about `common\models\Barangay`.
 */
class BarangaySearch extends Barangay
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'timestamp'], 'safe'],
            [['longitude', 'latitude'], 'number'],
            [['population', 'city_municipal_id', 'city_municipal_province_id', 'city_municipal_province_region_id'], 'integer'],
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
        $query = Barangay::find();

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
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'population' => $this->population,
            'city_municipal_id' => $this->city_municipal_id,
            'city_municipal_province_id' => $this->city_municipal_province_id,
            'city_municipal_province_region_id' => $this->city_municipal_province_region_id,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp]);

        return $dataProvider;
    }
}
