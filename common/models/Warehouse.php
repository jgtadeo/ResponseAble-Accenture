<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $id
 * @property string $name
 * @property string $contact_person_name
 * @property integer $year_established
 * @property string $description
 * @property string $area
 * @property string $timestamp
 * @property string $open_hours
 * @property string $close_hours
 * @property string $open_day
 * @property integer $warehouse_category
 * @property string $barangay_id
 *
 * @property Barangay $barangay
 * @property WarehouseCategory $warehouseCategory
 * @property WarehouseHasSupply[] $warehouseHasSupplies
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year_established', 'warehouse_category'], 'integer'],
            [['description'], 'string'],
            [['warehouse_category', 'barangay_id'], 'required'],
            [['name', 'contact_person_name'], 'string', 'max' => 255],
            [['area', 'open_day'], 'string', 'max' => 45],
            [['timestamp'], 'string', 'max' => 25],
            [['open_hours', 'close_hours'], 'string', 'max' => 15],
            [['barangay_id'], 'string', 'max' => 10],
            [['barangay_id'], 'exist', 'skipOnError' => true, 'targetClass' => Barangay::className(), 'targetAttribute' => ['barangay_id' => 'id']],
            [['warehouse_category'], 'exist', 'skipOnError' => true, 'targetClass' => WarehouseCategory::className(), 'targetAttribute' => ['warehouse_category' => 'id']],
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
            'contact_person_name' => 'Contact Person Name',
            'year_established' => 'Year Established',
            'description' => 'Description',
            'area' => 'Area',
            'timestamp' => 'Timestamp',
            'open_hours' => 'Open Hours',
            'close_hours' => 'Close Hours',
            'open_day' => 'Open Day',
            'warehouse_category' => 'Warehouse Category',
            'barangay_id' => 'Barangay ID',
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
    public function getWarehouseCategory()
    {
        return $this->hasOne(WarehouseCategory::className(), ['id' => 'warehouse_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouseHasSupplies()
    {
        return $this->hasMany(WarehouseHasSupply::className(), ['warehouse_id' => 'id']);
    }
}
