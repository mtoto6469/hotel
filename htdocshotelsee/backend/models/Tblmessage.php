<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblmessage".
 *
 * @property int $id
 * @property int $id_hotel
 * @property int $visit
 * @property int $id_user
 * @property string $text
 */
class Tblmessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblmessage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hotel', 'id_user','visit'], 'integer'],
            [['id_user', 'text','visit'], 'required'],
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hotel' => 'Id Hotel',
            'id_user' => 'Id User',
            'text' => 'Text',
            'visit'=>'visit'
        ];
    }
}
