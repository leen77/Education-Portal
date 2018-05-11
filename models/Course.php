<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $courseid
 * @property string $coursename
 * @property string $logo
 *
 * @property Admintemp[] $admintemps
 * @property Content[] $contents
 * @property Temp[] $temps
 * @property Tempv[] $tempvs
 * @property Topic[] $topics
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
     public $file;
    public function rules()
    {
        return [
            [['courseid', 'coursename', 'logo'], 'required'],
            [['courseid'], 'integer'],
            [['coursename'], 'string', 'max' => 50],
            [['logo'], 'string', 'max' => 200],
            [['file'],'file'],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'courseid' => 'Courseid',
            'coursename' => 'Coursename',
            'logo' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmintemps()
    {
        return $this->hasMany(Admintemp::className(), ['courseid' => 'courseid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['courseid' => 'courseid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemps()
    {
        return $this->hasMany(Temp::className(), ['courseid' => 'courseid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempvs()
    {
        return $this->hasMany(Tempv::className(), ['courseid' => 'courseid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['courseid' => 'courseid']);
    }
}
