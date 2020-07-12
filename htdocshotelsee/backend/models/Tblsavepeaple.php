<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblsavepeaple".
 *
 * @property int $id
 * @property int $id_hotel
 * @property string $name
 * @property string $tell
 * @property string $namehotel
 * @property string $date_enter
 * @property string $date_enter_ir
 * @property string $date_exit
 * @property string $date_exit_ir
 */
class Tblsavepeaple extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblsavepeaple';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hotel', 'name', 'tell', 'namehotel', 'date-enter', 'date-enter-ir', 'date-exit', 'date-exit-ir'], 'required'],
            [['id_hotel'], 'integer'],
            [['date_enter', 'date_exit'], 'safe'],
            [['name', 'tell', 'namehotel', 'date_enter_ir', 'date_exit_ir'], 'string', 'max' => 300],
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
            'name' => 'نام مسافر',
            'tell' => 'شماره تماس',
            'namehotel' => 'نام هتل',
            'date_enter' => 'Date Enter',
            'date_enter_ir' => 'تاریخ ورود',
            'date_exit' => 'Date Exit',
            'date_exit_ir' => 'تاریخ خروج',
        ];
    }
}
