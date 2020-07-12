<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblcod".
 *
 * @property int $id
 * @property int $id_hotel
 * @property string $code
 * @property int $enable
 */
class Tblcod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblcod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hotel', 'code'], 'required'],
            [['id_hotel', 'enable'], 'integer'],
            [['code'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hotel' => 'شناسه هتل',
            'code' => 'کد هتل',
            'enable' => 'قابل قبول',
        ];
    }
}
