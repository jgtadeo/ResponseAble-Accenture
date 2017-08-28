<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier_has_supply".
 *
 * @property integer $supplier_id
 * @property integer $supply_code
 *
 * @property Supplier $supplier
 * @property ListOfSupply $supplyCode
 */
class SupplierHasSupply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier_has_supply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'supply_code'], 'required'],
            [['supplier_id', 'supply_code'], 'integer'],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
            [['supply_code'], 'exist', 'skipOnError' => true, 'targetClass' => ListOfSupply::className(), 'targetAttribute' => ['supply_code' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Supplier ID',
            'supply_code' => 'Supply Code',
        ];
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
    public function getSupplyCode()
    {
        return $this->hasOne(ListOfSupply::className(), ['code' => 'supply_code']);
    }
}
