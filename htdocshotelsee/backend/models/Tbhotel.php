<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbhotel".
 *
 * @property int $id
 * @property string $name_hotel
 * @property string $name_hotel_en
 * @property string $name_manager_hotel
 * @property string $address_hotel
 * @property string $addrerss_hotel_en
 * @property string $city_hotel
 * @property int $city_hotel_en
 * @property string $status_star
 * @property double $map_x
 * @property double $map_y
 * @property string $phone
 * @property int $mobile_manager
 * @property string $logo_hotel
 * @property string $date
 * @property int $time
 * @property int $time_end
 * @property string $general_information
 * @property string $general_information_en
 * @property string $space
 * @property string $space_en
 * @property string $roles
 * @property string $roles_en
 * @property string $cod_manager
 * @property int $hom_count
 

 */
class Tbhotel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'tbhotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_hotel', 'name_hotel_en', 'name_manager_hotel', 'address_hotel', 'addrerss_hotel_en', 'city_hotel', 'city_hotel_en', 'status_star', 'phone', 'mobile_manager', 'logo_hotel', 'date', 'time', 'time_end'], 'required'],
            [[ 'mobile_manager', 'time', 'time_end','hom_count'], 'integer'],
            [['map_x', 'map_y'], 'safe'],
            [['date'], 'safe'],
            [['general_information', 'general_information_en', 'space', 'space_en', 'roles', 'roles_en'], 'string'],
            [['name_hotel', 'name_hotel_en', 'name_manager_hotel', 'address_hotel', 'addrerss_hotel_en', 'city_hotel', 'city_hotel_en','status_star', 'phone', 'logo_hotel','cod_manager'], 'string', 'max' => 300],
            [['file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_hotel' => 'نام هتل',
            'name_hotel_en' => 'نام هتل (لاتین)',
            'name_manager_hotel' => 'نام و نام خانوادگی صاحب هتل',
            'address_hotel' => 'آدرس هتل',
            'addrerss_hotel_en' => 'آدرس هتل (انگلیسی)',
            'city_hotel' => 'شهر',
            'city_hotel_en' => 'شهر(انگلیسی)',
            'status_star' => 'وضعیت',
            'map_x' => 'Map X',
            'map_y' => 'Map Y',
            'phone' => 'شماره تماس های هتل',
            'mobile_manager' => 'موبایل صاحب هتل',
            'logo_hotel' => 'لگو ',
            'date' => 'تاریخ قرارداد',
            'time' => 'Time',
            'time_end' => 'زمان اتمام قرار داد',
            'general_information' => 'توضیحات در باره هتل',
            'general_information_en' => 'توضیحات درباره هتل (انگلیسی)',
            'space' => 'فاصله هتل تا مراکز اصلی شهر',
            'space_en' => 'فاصله هتل تا مراکز اصلی شهر (انگلیسی)',
            'roles' => 'قوانین کلی هتل',
            'roles_en' => 'قوانین کلی هتل (انگلیسی)',
            'cod_manager'=>'کد ثبت نام مدیر',
            'hom_count'=>'تعداد اتاق های هتل'
  
        ];
    }
}
