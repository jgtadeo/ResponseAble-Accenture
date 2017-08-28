<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_of_supply".
 *
 * @property integer $code
 * @property string $name
 * @property string $date_expiration
 * @property string $date_received
 * @property string $description
 * @property string $timestamp
 * @property integer $supply_type_id
 * @property integer $unit_of_measurement_id
 * @property string $barangay_id
 * @property integer $weight
 * @property string $temperature_requirement
 * @property string $texture
 * @property string $is_sensitive
 * @property string $size
 *
 * @property Donation[] $donations
 * @property Barangay $barangay
 * @property SupplyType $supplyType
 * @property UnitOfMeasurement $unitOfMeasurement
 * @property SupplierHasSupply[] $supplierHasSupplies
 * @property Supplier[] $suppliers
 * @property Supply $supply
 */
class ListOfSupply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list_of_supply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'supply_type_id', 'unit_of_measurement_id', 'barangay_id', 'is_sensitive'], 'required'],
            [['description', 'temperature_requirement', 'is_sensitive'], 'string'],
            [['supply_type_id', 'unit_of_measurement_id', 'weight'], 'integer'],
            [['name', 'texture'], 'string', 'max' => 255],
            [['date_expiration', 'date_received', 'timestamp'], 'string', 'max' => 25],
            [['barangay_id'], 'string', 'max' => 10],
            [['name'], 'unique'],
            [['barangay_id'], 'exist', 'skipOnError' => true, 'targetClass' => Barangay::className(), 'targetAttribute' => ['barangay_id' => 'id']],
            [['supply_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SupplyType::className(), 'targetAttribute' => ['supply_type_id' => 'id']],
            [['unit_of_measurement_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnitOfMeasurement::className(), 'targetAttribute' => ['unit_of_measurement_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'date_expiration' => 'Date Expiration',
            'date_received' => 'Date Received',
            'description' => 'Description',
            'timestamp' => 'Timestamp',
            'supply_type_id' => 'Supply Type ID',
            'unit_of_measurement_id' => 'Unit Of Measurement ID',
            'barangay_id' => 'Barangay ID',
            'weight' => 'Weight',
            'temperature_requirement' => 'Temperature Requirement',
            'texture' => 'Texture',
            'is_sensitive' => 'Is Sensitive',
            'size' => 'Size',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donation::className(), ['supply' => 'name']);
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
    public function getSupplyType()
    {
        return $this->hasOne(SupplyType::className(), ['id' => 'supply_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitOfMeasurement()
    {
        return $this->hasOne(UnitOfMeasurement::className(), ['id' => 'unit_of_measurement_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierHasSupplies()
    {
        return $this->hasMany(SupplierHasSupply::className(), ['supply_code' => 'code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['id' => 'supplier_id'])->viaTable('supplier_has_supply', ['supply_code' => 'code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupply()
    {
        return $this->hasOne(Supply::className(), ['list_of_supply_code' => 'code']);
    }
}
