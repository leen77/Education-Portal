<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $contentid
 * @property string $contentname
 * @property integer $courseid
 * @property integer $topicid
 * @property integer $tutorid
 * @property string $plocation
 * @property string $vlocation
 * @property integer $likes
 *
 * @property Comment[] $comments
 * @property Course $course
 * @property Topic $topic
 * @property Tutor $tutor
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contentid', 'contentname', 'courseid', 'topicid', 'tutorid'], 'required'],
            [['contentid', 'courseid', 'topicid', 'tutorid', 'likes'], 'integer'],
            [['contentname', 'plocation', 'vlocation'], 'string', 'max' => 100],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'courseid']],
            [['topicid'], 'exist', 'skipOnError' => true, 'targetClass' => Topic::className(), 'targetAttribute' => ['topicid' => 'topicid']],
            [['tutorid'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['tutorid' => 'tutorid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contentid' => 'Contentid',
            'contentname' => 'Contentname',
            'courseid' => 'Courseid',
            'topicid' => 'Topicid',
            'tutorid' => 'Tutorid',
            'plocation' => 'Plocation',
            'vlocation' => 'Vlocation',
            'likes' => 'Likes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['contentid' => 'contentid']);
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
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['topicid' => 'topicid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Tutor::className(), ['tutorid' => 'tutorid']);
    }
}
