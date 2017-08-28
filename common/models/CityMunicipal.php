<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_municipal".
 *
 * @property integer $id
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 * @property integer $population
 * @property string $timestamp
 * @property integer $province_id
 * @property integer $province_region_id
 *
 * @property Barangay[] $barangays
 * @property Province $province
 */
class CityMunicipal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_municipal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'province_id', 'province_region_id'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['population', 'province_id', 'province_region_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['timestamp'], 'string', 'max' => 20],
            [['name'], 'unique'],
            [['province_id', 'province_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['province_id' => 'id', 'province_region_id' => 'region_id']],
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
            'province_id' => 'Province ID',
            'province_region_id' => 'Province Region ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangays()
    {
        return $this->hasMany(Barangay::className(), ['city_municipal_id' => 'id', 'city_municipal_province_id' => 'province_id', 'city_municipal_province_region_id' => 'province_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['id' => 'province_id', 'region_id' => 'province_region_id']);
    }
}
