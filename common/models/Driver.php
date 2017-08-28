<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "driver".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $license_type
 * @property string $contact_number
 *
 * @property VehicleHasDriver[] $vehicleHasDrivers
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'license_type'], 'required'],
            [['license_type'], 'string'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 50],
            [['contact_number'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'license_type' => 'License Type',
            'contact_number' => 'Contact Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleHasDrivers()
    {
        return $this->hasMany(VehicleHasDriver::className(), ['driver_id' => 'id']);
    }
}
