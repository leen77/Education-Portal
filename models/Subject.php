<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property integer $subjectid
 * @property string $subjectnm
 * @property integer $courseid
 *
 * @property Content[] $contents
 * @property Course $course
 * @property Uploads[] $uploads
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subjectid', 'subjectnm', 'courseid'], 'required'],
            [['subjectid', 'courseid'], 'integer'],
            [['subjectnm'], 'string', 'max' => 100],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'courseid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subjectid' => 'Subjectid',
            'subjectnm' => 'Subjectnm',
            'courseid' => 'Courseid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['subjectid' => 'subjectid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['courseid' => 'courseid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUploads()
    {
        return $this->hasMany(Uploads::className(), ['subjectid' => 'subjectid']);
    }
}
