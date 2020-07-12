<?php

namespace backend\models;

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
    public  $filed;
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
            ['filed','file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hotel' => 'هتل',
            'id_khadamat' => 'نام خدمات',
            'logo' => 'لگو',
            'title' => 'عنوان',
            'text' => 'توضیحات بیشتر',
        ];
    }

    public function getIdKhadamat()
    {
        return $this->hasOne(Tblkhadamat::className(), ['id' => 'id_khadamat']);
    }
}
