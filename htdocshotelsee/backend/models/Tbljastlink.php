<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbljastlink".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 */
class Tbljastlink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbljastlink';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['title', 'link'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'title' => 'عنوان تبلیغ',
            'link' => 'لینک',
        ];
    }
}
