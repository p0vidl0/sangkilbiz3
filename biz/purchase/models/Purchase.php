<?php

namespace biz\purchase\models;

use Yii;

use biz\master\models\Supplier;
use biz\master\models\Branch;

/**
 * This is the model class for table "purchase".
 *
 * @property integer $id_purchase
 * @property string $purchase_num
 * @property integer $id_supplier
 * @property integer $id_branch
 * @property string $purchase_date
 * @property string $purchase_value
 * @property string $item_discount
 * @property integer $status
 * @property string $create_at
 * @property integer $create_by
 * @property string $update_at
 * @property integer $update_by
 * 
 * @property string $nmStatus
 * @property string $purchaseDate
 *
 * @property Supplier $idSupplier
 * @property Branch $idBranch
 * @property PurchaseDtl[] $purchaseDtls
 * 
 * @method array saveRelation(string $relation) Description
 */
class Purchase extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 1;
    const STATUS_RECEIVE = 2;

    public $id_warehouse;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%purchase}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_supplier', 'id_branch', 'purchaseDate', 'purchase_value', 'status'], 'required'],
            [['id_branch', 'status'], 'integer'],
            [['purchase_date', 'id_warehouse'], 'safe'],
            [['item_discount'],'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_purchase' => 'Id Purchase',
            'purchase_num' => 'Purchase Num',
            'id_supplier' => 'Id Supplier',
            'id_branch' => 'Id Branch',
            'purchase_date' => 'Purchase Date',
            'purchase_value' => 'Purchase Value',
            'item_discount' => 'Item Discount',
            'status' => 'Status',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
            'update_at' => 'Update At',
            'update_by' => 'Update By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id_supplier' => 'id_supplier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBranch()
    {
        return $this->hasOne(Branch::className(), ['id_branch' => 'id_branch']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDtls()
    {
        return $this->hasMany(PurchaseDtl::className(), ['id_purchase' => 'id_purchase']);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'BizTimestampBehavior',
            'BizBlameableBehavior',
            [
                'class' => 'mdm\autonumber\Behavior',
                'digit' => 4,
                'group' => 'purchase',
                'attribute' => 'purchase_num',
                'value' => 'PU' . date('y.?')
            ],
            [
                'class'=>'mdm\converter\DateConverter',
                'attributes'=>[
                    'purchaseDate' => 'purchase_date',
                ]
            ],
            'BizStatusConverter',
            'class'=>'mdm\relation\RelationBehavior',
        ];
    }
}