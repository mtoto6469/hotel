<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblcathotel".
 *
 * @property int $id
 * @property int $id_hotel
 * @property string $title
 * @property string $title_en
 * @property string $logo
 * @property string $position
 */
class Tblcathotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblcathotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hotel', 'title', 'title_en', 'logo'], 'required'],
            [['id_hotel','position'], 'integer'],
            [['title', 'title_en', 'logo'], 'string', 'max' => 300],
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
            'title' => 'Title',
            'title_en' => 'Title En',
            'logo' => 'Logo',
        ];
    }
}
