<?php

namespace frontend\models;

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
 * @property string $city_hotel_en
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbhotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_hotel', 'name_hotel_en', 'name_manager_hotel', 'address_hotel', 'addrerss_hotel_en', 'city_hotel', 'city_hotel_en', 'status_star', 'phone', 'mobile_manager', 'logo_hotel', 'date', 'time', 'time_end', 'cod_manager'], 'required'],
            [['map_x', 'map_y'], 'number'],
            [['mobile_manager', 'time', 'time_end','hom_count'], 'integer'],
            [['date'], 'safe'],
            [['general_information', 'general_information_en', 'space', 'space_en', 'roles', 'roles_en'], 'string'],
            [['name_hotel', 'name_hotel_en', 'name_manager_hotel', 'address_hotel', 'addrerss_hotel_en', 'city_hotel', 'city_hotel_en', 'status_star', 'phone', 'logo_hotel', 'cod_manager'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_hotel' => 'Name Hotel',
            'name_hotel_en' => 'Name Hotel En',
            'name_manager_hotel' => 'Name Manager Hotel',
            'address_hotel' => 'Address Hotel',
            'addrerss_hotel_en' => 'Addrerss Hotel En',
            'city_hotel' => 'City Hotel',
            'city_hotel_en' => 'City Hotel En',
            'status_star' => 'Status Star',
            'map_x' => 'Map X',
            'map_y' => 'Map Y',
            'phone' => 'Phone',
            'mobile_manager' => 'Mobile Manager',
            'logo_hotel' => 'Logo Hotel',
            'date' => 'Date',
            'time' => 'Time',
            'time_end' => 'Time End',
            'general_information' => 'General Information',
            'general_information_en' => 'General Information En',
            'space' => 'Space',
            'space_en' => 'Space En',
            'roles' => 'Roles',
            'roles_en' => 'Roles En',
            'cod_manager' => 'Cod Manager',
            'hom_count' => 'hom_count',
        ];
    }
}
