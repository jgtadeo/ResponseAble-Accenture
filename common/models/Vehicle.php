<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehicle".
 *
 * @property string $plate_number
 * @property string $model
 * @property integer $is_lease
 * @property string $timestamp
 * @property string $available_day
 * @property string $available_hour_start
 * @property string $available_hour_end
 * @property integer $vehicle_type
 * @property integer $vehicle_category
 * @property integer $owner
 * @property integer $vehicle_size
 * @property string $barangay_id
 * @property integer $length_in_ft
 * @property integer $width_in_ft
 * @property integer $height_in_ft
 * @property integer $maximum_capacity_in_kg
 * @property string $max_distance
 *
 * @property Barangay $barangay
 * @property User $owner0
 * @property VehicleCategory $vehicleCategory
 * @property VehicleSize $vehicleSize
 * @property VehicleType $vehicleType
 * @property VehicleHasDriver $vehicleHasDriver
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plate_number', 'vehicle_type', 'vehicle_category', 'owner', 'vehicle_size', 'barangay_id'], 'required'],
            [['is_lease', 'vehicle_type', 'vehicle_category', 'owner', 'vehicle_size', 'length_in_ft', 'width_in_ft', 'height_in_ft', 'maximum_capacity_in_kg'], 'integer'],
            [['available_day'], 'string'],
            [['plate_number', 'available_hour_start', 'available_hour_end', 'barangay_id'], 'string', 'max' => 10],
            [['model'], 'string', 'max' => 100],
            [['timestamp'], 'string', 'max' => 25],
            [['max_distance'], 'string', 'max' => 255],
            [['plate_number'], 'unique'],
            [['barangay_id'], 'exist', 'skipOnError' => true, 'targetClass' => Barangay::className(), 'targetAttribute' => ['barangay_id' => 'id']],
            [['owner'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner' => 'id']],
            [['vehicle_category'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleCategory::className(), 'targetAttribute' => ['vehicle_category' => 'id']],
            [['vehicle_size'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleSize::className(), 'targetAttribute' => ['vehicle_size' => 'id']],
            [['vehicle_type'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleType::className(), 'targetAttribute' => ['vehicle_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plate_number' => 'Plate Number',
            'model' => 'Model',
            'is_lease' => 'Is Lease',
            'timestamp' => 'Timestamp',
            'available_day' => 'Available Day',
            'available_hour_start' => 'Available Hour Start',
            'available_hour_end' => 'Available Hour End',
            'vehicle_type' => 'Vehicle Type',
            'vehicle_category' => 'Vehicle Category',
            'owner' => 'Owner',
            'vehicle_size' => 'Vehicle Size',
            'barangay_id' => 'Barangay ID',
            'length_in_ft' => 'Length In Ft',
            'width_in_ft' => 'Width In Ft',
            'height_in_ft' => 'Height In Ft',
            'maximum_capacity_in_kg' => 'Maximum Capacity In Kg',
            'max_distance' => 'Max Distance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangay()
    {
        return $this->hasOne(Barangay::className(), ['id' => 'barangay_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleCategory()
    {
        return $this->hasOne(VehicleCategory::className(), ['id' => 'vehicle_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleSize()
    {
        return $this->hasOne(VehicleSize::className(), ['id' => 'vehicle_size']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleType()
    {
        return $this->hasOne(VehicleType::className(), ['id' => 'vehicle_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleHasDriver()
    {
        return $this->hasOne(VehicleHasDriver::className(), ['vehicle_plate_number' => 'plate_number']);
    }
}
