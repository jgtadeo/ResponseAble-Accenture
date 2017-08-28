<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehicle_has_driver".
 *
 * @property string $vehicle_plate_number
 * @property integer $driver_id
 *
 * @property Request[] $requests
 * @property Driver $driver
 * @property Vehicle $vehiclePlateNumber
 */
class VehicleHasDriver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_has_driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_plate_number', 'driver_id'], 'required'],
            [['driver_id'], 'integer'],
            [['vehicle_plate_number'], 'string', 'max' => 10],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'id']],
            [['vehicle_plate_number'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_plate_number' => 'plate_number']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vehicle_plate_number' => 'Vehicle Plate Number',
            'driver_id' => 'Driver ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['vehicle_plate_number' => 'vehicle_plate_number']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiclePlateNumber()
    {
        return $this->hasOne(Vehicle::className(), ['plate_number' => 'vehicle_plate_number']);
    }
}
