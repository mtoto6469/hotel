<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbllink".
 *
 * @property int $id
 * @property string $img
 * @property string $link
 * @property string $title
 * @property string $description
 * @property string $status
 * @property int $alt
 * @property int $id_hotel
 */
class Tbllink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
  
    public static function tableName()
    {
        return 'tbllink';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'link', 'title', 'description', 'alt'], 'required'],
            [['description'], 'string'],
            [[ 'id_hotel'], 'integer'],
            [['alt','img', 'link', 'title','status'], 'string', 'max' => 300],
            [['file'],'file'],
           
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
            'link' => 'لینک',
            'title' => 'عنوان',
            'description' => 'توضیحات کوتاه',
            'alt' => 'نوشته عکس',
            'id_hotel' => 'شناسه هتل',
            'status' => 'وضعیت',
        ];
    }
}
