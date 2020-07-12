<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblprofile".
 *
 * @property int $id
 * @property int $id_hotel
 * @property string $name
 * @property string $username
 * @property string $lastname
 * @property string $mobile
 * @property string $rome_number
 * @property int $count_peapel
 * @property string $img
 * @property string $date_enter
 * @property string $date_exit
 * @property int $cod_manager
 * @property string $role
 * @property string $date_enter_id
 * @property string $date_exit_ir
 * @property int $id_user,
 * @property int $phase,
 */
class Tblprofile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public $password;
    public static function tableName()
    {
        return 'tblprofile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'lastname', 'mobile', 'role','id_user','username'], 'required'],
            [['id_hotel', 'count_peapel','id_user'], 'integer'],
            [['date_enter', 'date_exit'], 'safe'],
            [['name', 'lastname', 'mobile', 'rome_number', 'img', 'role', 'date_enter_id', 'date_exit_ir','username', 'cod_manager','phase'], 'string', 'max' => 300],
            ['file','file'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hotel' => 'نام هتل',
            'id_user'=>'نام کاربری',
            'name' => 'نام',
            'lastname' => 'نام خانوادگی',
            'mobile' => 'شماره تماس',
            'rome_number' => 'شماره اتاق',
            'count_peapel' => 'تعداد افراد',
            'img' => 'عکس پروفایل',
            'date_enter' => 'تاریخ ورود',
            'date_exit' => 'تاریخ خروج',
            'cod_manager' => 'کد ',
            'role' => 'نقش',
            'date_enter_id' => 'تاریخ ورود',
            'date_exit_ir' => 'تاریخ خروج',
            'phase'=>'فاز',
            'password'=>'رمز عبور',
        ];
    }
}
