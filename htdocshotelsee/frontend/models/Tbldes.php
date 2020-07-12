<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbldes".
 *
 * @property int $id
 * @property int $id_hotel
 * @property int $id_khadamat
 * @property string $logo
 * @property string $title
 * @property string $text
 */
class Tbldes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbldes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hotel', 'id_khadamat', 'logo', 'title', 'text'], 'required'],
            [['id_hotel', 'id_khadamat'], 'integer'],
            [['text'], 'string'],
            [['logo', 'title'], 'string', 'max' => 300],
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
            'id_khadamat' => 'Id Khadamat',
            'logo' => 'Logo',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
