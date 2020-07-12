<?php

namespace frontend\models;

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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblsans';
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_khadamat' => 'Id Khadamat',
            'day_of_weeken' => 'Day Of Weeken',
            'time' => 'Time',
            'women_men' => 'Women Men',
            'descrition' => 'Descrition',
            'id_hotel' => 'Id Hotel',
        ];
    }
}
