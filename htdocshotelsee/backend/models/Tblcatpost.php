<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblcatpost".
 *
 * @property int $id
 * @property int $id_parent
 * @property string $logo
 * @property string $description
 * @property string $title
 * @property int $enable
 */
class Tblcatpost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $filec;
    public static function tableName()
    {
        return 'tblcatpost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parent', 'logo', 'description', 'title'], 'required'],
            [['id_parent', 'enable'], 'integer'],
            [['logo', 'title'], 'string', 'max' => 300],
            [['description'], 'string', 'max' => 100],
            ['filec','file']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'id_parent' => 'شناسه والد',
            'logo' => 'لوگو ',
            'filec' => 'لوگو ',
            'description' => 'توضیحات کوتاه',
            'title' => 'عنوان',
            'enable' => 'قابل نمایش',
        ];
    }
}
