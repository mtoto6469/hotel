<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblkhadamat".
 *
 * @property int $id
 * @property int $id_hotel
 * @property string $category
 * @property string $name
 * @property string $phone
 * @property string $khadamat
 * @property string $location
 * @property string $roles
 * @property string $img
 * @property string $img_menu
 * @property int $mobile
 * @property int $sms_notification
 */
class Tblkhadamat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblkhadamat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hotel', 'category', 'name', 'phone', 'location', 'img'], 'required'],
            [['id_hotel', 'mobile', 'sms_notification'], 'integer'],
            [['khadamat', 'roles'], 'string'],
            [['category', 'name', 'phone', 'location', 'img', 'img_menu'], 'string', 'max' => 300],
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
            'category' => 'Category',
            'name' => 'Name',
            'phone' => 'Phone',
            'khadamat' => 'Khadamat',
            'location' => 'Location',
            'roles' => 'Roles',
            'img' => 'Img',
            'img_menu' => 'Img Menu',
            'mobile' => 'Mobile',
            'sms_notification' => 'Sms Notification',
        ];
    }
}
