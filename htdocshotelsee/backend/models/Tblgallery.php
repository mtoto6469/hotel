<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblgallery".
 *
 * @property int $id
 * @property int $id_hotel
 * @property string $img
 * @property string $alt
 * @property string $description
 * @property int $enabel
 */
class Tblgallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file3;
    public static function tableName()
    {
        return 'tblgallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'alt', 'description','id_hotel'], 'required'],
            [['img', 'alt', 'description'], 'string', 'max' => 300],
            ['id_hotel','integer'],
   ['enabel','integer'],
            ['file3','file']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'img' => 'عکس',
            'alt' => 'نوشته عکس',
            'description' => 'توضیحات',
            'id_hotel'=>'شناسه هتل',
'enabel'=>'قابل نمایش در صفحه گالری',
        ];
    }
}
