<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblroom".
 *
 * @property int $id
 * @property int $id_hotel
 * @property string $name
 * @property int $number
 * @property int $fill
 */
class Tblroom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblroom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hotel', 'number','name'], 'required'],
            [['id_hotel', 'number','fill'], 'integer'],
            [['name'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hotel' => 'نام هتل',
            'name' => 'نام اتاق',
            'number' => 'شماره اتاق',
            'fill' => 'پر یا خالی',
        ];
    }
}
