<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $website
 * @property string $contact_person
 * @property string $timestamp
 * @property string $principal_name
 * @property string $principal_title
 * @property integer $business_number_of_year
 * @property string $description
 * @property integer $supplier_type_id
 * @property integer $legal_structure_id
 * @property integer $primary_commodity_id
 * @property string $barangay_id
 *
 * @property Barangay $barangay
 * @property LegalStructure $legalStructure
 * @property PrimaryCommodity $primaryCommodity
 * @property SupplierType $supplierType
 * @property SupplierHasSupply[] $supplierHasSupplies
 * @property ListOfSupply[] $supplyCodes
 * @property Supply[] $supplies
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'supplier_type_id', 'legal_structure_id', 'primary_commodity_id', 'barangay_id'], 'required'],
            [['principal_title', 'description'], 'string'],
            [['business_number_of_year', 'supplier_type_id', 'legal_structure_id', 'primary_commodity_id'], 'integer'],
            [['name', 'website', 'contact_person', 'principal_name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['timestamp'], 'string', 'max' => 45],
            [['barangay_id'], 'string', 'max' => 10],
            [['name'], 'unique'],
            [['barangay_id'], 'exist', 'skipOnError' => true, 'targetClass' => Barangay::className(), 'targetAttribute' => ['barangay_id' => 'id']],
            [['legal_structure_id'], 'exist', 'skipOnError' => true, 'targetClass' => LegalStructure::className(), 'targetAttribute' => ['legal_structure_id' => 'id']],
            [['primary_commodity_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrimaryCommodity::className(), 'targetAttribute' => ['primary_commodity_id' => 'id']],
            [['supplier_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SupplierType::className(), 'targetAttribute' => ['supplier_type_id' => 'id']],
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
            'email' => 'Email',
            'website' => 'Website',
            'contact_person' => 'Contact Person',
            'timestamp' => 'Timestamp',
            'principal_name' => 'Principal Name',
            'principal_title' => 'Principal Title',
            'business_number_of_year' => 'Business Number Of Year',
            'description' => 'Description',
            'supplier_type_id' => 'Supplier Type ID',
            'legal_structure_id' => 'Legal Structure ID',
            'primary_commodity_id' => 'Primary Commodity ID',
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
    public function getLegalStructure()
    {
        return $this->hasOne(LegalStructure::className(), ['id' => 'legal_structure_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrimaryCommodity()
    {
        return $this->hasOne(PrimaryCommodity::className(), ['id' => 'primary_commodity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierType()
    {
        return $this->hasOne(SupplierType::className(), ['id' => 'supplier_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierHasSupplies()
    {
        return $this->hasMany(SupplierHasSupply::className(), ['supplier_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplyCodes()
    {
        return $this->hasMany(ListOfSupply::className(), ['code' => 'supply_code'])->viaTable('supplier_has_supply', ['supplier_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplies()
    {
        return $this->hasMany(Supply::className(), ['supplier_id' => 'id']);
    }
}
