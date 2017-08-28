<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supply".
 *
 * @property integer $supplier_id
 * @property integer $list_of_supply_code
 *
 * @property ListOfSupply $listOfSupplyCode
 * @property Supplier $supplier
 * @property WarehouseHasSupply $warehouseHasSupply
 */
class Supply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'list_of_supply_code'], 'required'],
            [['supplier_id', 'list_of_supply_code'], 'integer'],
            [['list_of_supply_code'], 'exist', 'skipOnError' => true, 'targetClass' => ListOfSupply::className(), 'targetAttribute' => ['list_of_supply_code' => 'code']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Supplier ID',
            'list_of_supply_code' => 'List Of Supply Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListOfSupplyCode()
    {
        return $this->hasOne(ListOfSupply::className(), ['code' => 'list_of_supply_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouseHasSupply()
    {
        return $this->hasOne(WarehouseHasSupply::className(), ['supply_list_of_supply_code' => 'list_of_supply_code']);
    }
}
