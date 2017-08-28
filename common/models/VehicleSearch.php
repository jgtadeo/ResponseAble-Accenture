<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vehicle;

/**
 * VehicleSearch represents the model behind the search form about `common\models\Vehicle`.
 */
class VehicleSearch extends Vehicle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plate_number', 'model', 'timestamp', 'available_day', 'available_hour_start', 'available_hour_end', 'barangay_id', 'max_distance'], 'safe'],
            [['is_lease', 'vehicle_type', 'vehicle_category', 'owner', 'vehicle_size', 'length_in_ft', 'width_in_ft', 'height_in_ft', 'maximum_capacity_in_kg'], 'integer'],
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
        $query = Vehicle::find();

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
            'is_lease' => $this->is_lease,
            'vehicle_type' => $this->vehicle_type,
            'vehicle_category' => $this->vehicle_category,
            'owner' => $this->owner,
            'vehicle_size' => $this->vehicle_size,
            'length_in_ft' => $this->length_in_ft,
            'width_in_ft' => $this->width_in_ft,
            'height_in_ft' => $this->height_in_ft,
            'maximum_capacity_in_kg' => $this->maximum_capacity_in_kg,
        ]);

        $query->andFilterWhere(['like', 'plate_number', $this->plate_number])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'available_day', $this->available_day])
            ->andFilterWhere(['like', 'available_hour_start', $this->available_hour_start])
            ->andFilterWhere(['like', 'available_hour_end', $this->available_hour_end])
            ->andFilterWhere(['like', 'barangay_id', $this->barangay_id])
            ->andFilterWhere(['like', 'max_distance', $this->max_distance]);

        return $dataProvider;
    }
}
