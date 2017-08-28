<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "warehouse_has_supply".
 *
 * @property integer $warehouse_id
 * @property integer $supply_list_of_supply_code
 *
 * @property Request[] $requests
 * @property Supply $supplyListOfSupplyCode
 * @property Warehouse $warehouse
 */
class WarehouseHasSupply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse_has_supply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id', 'supply_list_of_supply_code'], 'required'],
            [['warehouse_id', 'supply_list_of_supply_code'], 'integer'],
            [['supply_list_of_supply_code'], 'exist', 'skipOnError' => true, 'targetClass' => Supply::className(), 'targetAttribute' => ['supply_list_of_supply_code' => 'list_of_supply_code']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'warehouse_id' => 'Warehouse ID',
            'supply_list_of_supply_code' => 'Supply List Of Supply Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['supply' => 'supply_list_of_supply_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplyListOfSupplyCode()
    {
        return $this->hasOne(Supply::className(), ['list_of_supply_code' => 'supply_list_of_supply_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }
}
