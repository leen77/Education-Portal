<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "form".
 *
 * @property integer $id
 * @property string $title
 * @property string $email
 * @property string $text
 */
class Form extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc

     */

    public $file;

    public static function tableName()
    {
        return 'form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'email', 'text'], 'required'],
            [['text'], 'string'],
            [['title', 'email'], 'string', 'max' => 200],
            [['file'],'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'email' => 'Email',
            'text' => 'Text',
            'file'=>'UploadFile'
        ];
    }
}
