<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property integer $id
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 * @property integer $population
 * @property string $timestamp
 * @property integer $region_id
 *
 * @property CityMunicipal[] $cityMunicipals
 * @property Region $region
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'region_id'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['population', 'region_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['timestamp'], 'string', 'max' => 45],
            [['name'], 'unique'],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'population' => 'Population',
            'timestamp' => 'Timestamp',
            'region_id' => 'Region ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityMunicipals()
    {
        return $this->hasMany(CityMunicipal::className(), ['province_id' => 'id', 'province_region_id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
