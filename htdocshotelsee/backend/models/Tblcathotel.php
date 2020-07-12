<?php

namespace backend\models;

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
     * {@inheritdoc}
     */
    public $fileh;
    public static function tableName()
    {
        return 'tblcathotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hotel', 'title', 'title_en', 'logo'], 'required'],
            [['id_hotel','position'], 'integer'],
            [['title', 'logo'], 'string', 'max' => 300],
            ['fileh','file'],
//            [['id_hotel'], 'exist', 'skipOnError' => true, 'targetClass' => Tbhotel::className(), 'targetAttribute' => ['id_name' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hotel' => 'هتل',
            'title' => 'عنوان',
            'title_en' => 'عنوان انگلیسی',
            'logo' => 'لوگو',
            'fileh' => 'لوگو',
            'position'=>'الویت',
        ];
    }


    public function getIdHotel()
    {
        return $this->hasOne(Tbhotel::className(), ['id' => 'id_hotel']);
    }
}
