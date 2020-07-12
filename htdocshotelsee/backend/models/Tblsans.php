<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblsans".
 *
 * @property int $id
 * @property int $id_khadamat
 * @property string $day_of_weeken
 * @property string $time
 * @property string $women_men
 * @property string $descrition
 * @property int $id_hotel
 */
class Tblsans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblsans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_khadamat', 'day_of_weeken', 'time', 'women_men', 'descrition', 'id_hotel'], 'required'],
            [['id_khadamat', 'id_hotel'], 'integer'],
            [['day_of_weeken', 'time', 'women_men', 'descrition'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_khadamat' => 'شناسه خدمات',
            'day_of_weeken' => 'روز های هفته',
            'time' => 'زمان بندی',
            'women_men' => 'سانس زنانه/ سانس مردانه',
            'descrition' => 'خدمات',
            'id_hotel' => 'شناسه هتل',
        ];
    }

    public function getIdKhadamat()
    {
        return $this->hasOne(Tblkhadamat::className(), ['id' => 'id_khadamat']);
    }
}
