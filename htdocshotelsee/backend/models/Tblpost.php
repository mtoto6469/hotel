<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblpost".
 *
 * @property int $id
 * @property string $title
 * @property string $descriptipn
 * @property string $meta
 * @property string $keyword
 * @property string $text
 * @property int $enable
 * @property int $id_cat
 */
class Tblpost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblpost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'descriptipn', 'meta', 'keyword', 'text','id_cat'], 'required'],
            [['text'], 'string'],
            [['title', 'descriptipn', 'meta', 'keyword'], 'string', 'max' => 300],
            [['id_cat','enable'],'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'عنوان',
            'descriptipn' => 'توضیحات کوتاه',
            'meta' => 'متا تگ',
            'keyword' => 'کلمه کلیدی',
            'text' => 'متن',
            'enable'=>'قابل نمایش',
            'id_cat'=>'دسته بندی',
        ];
    }
}
