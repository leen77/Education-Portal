<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tempv".
 *
 * @property integer $tempvid
 * @property integer $courseid
 * @property string $topicname
 * @property string $video
 *
 * @property Course $course
 */
class Tempv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tempv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courseid', 'topicname', 'video'], 'required'],
            [['courseid'], 'integer'],
            [['topicname', 'video'], 'string', 'max' => 200],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'courseid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tempvid' => 'Tempvid',
            'courseid' => 'Courseid',
            'topicname' => 'Topicname',
            'video' => 'Video',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['courseid' => 'courseid']);
    }
}
