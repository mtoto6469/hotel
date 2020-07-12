<?php

namespace backend\models;

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
     * {@inheritdoc}
     */
    public $file5;
    public $multyfile;
    public static function tableName()
    {
        return 'tblkhadamat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hotel', 'category', 'name', 'phone', 'location', 'img','file5'], 'required'],
            [['id_hotel', 'mobile', 'sms_notification'], 'integer'],
            [['khadamat', 'roles'], 'string'],
            [['category', 'name', 'phone', 'location', 'img', 'img_menu'], 'string', 'max' => 300],
            [['file5'],'file'],
            ['multyfile','file', 'maxFiles' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'id_hotel' => 'شناسه هتل',
            'category' => 'دسته بندی',
            'name' => 'نام',
            'phone' => 'تلفن های تماس',
            'khadamat' => 'خدمات ارائه دهنده',
            'location' => 'موقعیت مکانی در هتل',
            'roles' => 'قوانین و قیمت ها',
            'img' => 'عکس از نما ',
            'img_menu' => 'عکسی از منو (رستوران ، کافی شاپ )',
            'file5' => 'عکس از نما ',
            'multyfile' => 'عکسی از منو (رستوران ، کافی شاپ )',
            'mobile' => 'شماره موبایل',
            'sms_notification' => 'دریافت نوتیفیکیشن',
        ];
    }
}
