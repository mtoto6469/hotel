<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblgallery".
 *
 * @property int $id
 * @property string $img
 * @property string $alt
 * @property string $description
 * @property int $id_hotel
 */
class Tblgallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblgallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img', 'alt', 'description', 'id_hotel'], 'required'],
            [['id_hotel'], 'integer'],
            [['img', 'alt', 'description'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'alt' => 'Alt',
            'description' => 'Description',
            'id_hotel' => 'Id Hotel',
        ];
    }
}
