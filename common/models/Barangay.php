<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barangay".
 *
 * @property string $id
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 * @property integer $population
 * @property string $timestamp
 * @property integer $city_municipal_id
 * @property integer $city_municipal_province_id
 * @property integer $city_municipal_province_region_id
 *
 * @property CityMunicipal $cityMunicipal
 * @property ListOfSupply[] $listOfSupplies
 * @property Supplier[] $suppliers
 * @property User[] $users
 * @property Vehicle[] $vehicles
 * @property Warehouse[] $warehouses
 */
class Barangay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barangay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'city_municipal_id', 'city_municipal_province_id', 'city_municipal_province_region_id'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['population', 'city_municipal_id', 'city_municipal_province_id', 'city_municipal_province_region_id'], 'integer'],
            [['id'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 50],
            [['timestamp'], 'string', 'max' => 20],
            [['id'], 'unique'],
            [['name'], 'unique'],
            [['city_municipal_id', 'city_municipal_province_id', 'city_municipal_province_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => CityMunicipal::className(), 'targetAttribute' => ['city_municipal_id' => 'id', 'city_municipal_province_id' => 'province_id', 'city_municipal_province_region_id' => 'province_region_id']],
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
            'city_municipal_id' => 'City Municipal ID',
            'city_municipal_province_id' => 'City Municipal Province ID',
            'city_municipal_province_region_id' => 'City Municipal Province Region ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityMunicipal()
    {
        return $this->hasOne(CityMunicipal::className(), ['id' => 'city_municipal_id', 'province_id' => 'city_municipal_province_id', 'province_region_id' => 'city_municipal_province_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListOfSupplies()
    {
        return $this->hasMany(ListOfSupply::className(), ['barangay_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['barangay_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['barangay_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicle::className(), ['barangay_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouse::className(), ['barangay_id' => 'id']);
    }
}
