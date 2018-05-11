<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "topic".
 *
 * @property integer $topicid
 * @property string $topicname
 * @property integer $courseid
 *
 * @property Content[] $contents
 * @property Course $course
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topicid', 'topicname', 'courseid'], 'required'],
            [['topicid', 'courseid'], 'integer'],
            [['topicname'], 'string', 'max' => 30],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'courseid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'topicid' => 'Topicid',
            'topicname' => 'Topicname',
            'courseid' => 'Courseid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['topicid' => 'topicid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['courseid' => 'courseid']);
    }
}
