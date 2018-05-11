<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "uploads".
 *
 * @property integer $uploadid
 * @property integer $tutorid
 * @property integer $subjectid
 * @property integer $cousreid
 * @property integer $topicid
 * @property string $type
 * @property string $location
 * @property string $state
 *
 * @property Tutor $tutor
 * @property Subject $subject
 * @property Course $cousre
 * @property Topic $topic
 */
class Uploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uploadid', 'tutorid', 'subjectid', 'cousreid', 'topicid', 'type', 'location', 'state'], 'required'],
            [['uploadid', 'tutorid', 'subjectid', 'cousreid', 'topicid'], 'integer'],
            [['type'], 'string', 'max' => 30],
            [['location'], 'string', 'max' => 100],
            [['state'], 'string', 'max' => 50],
            [['tutorid'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['tutorid' => 'tutorid']],
            [['subjectid'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subjectid' => 'subjectid']],
            [['cousreid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['cousreid' => 'courseid']],
            [['topicid'], 'exist', 'skipOnError' => true, 'targetClass' => Topic::className(), 'targetAttribute' => ['topicid' => 'topicid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uploadid' => 'Uploadid',
            'tutorid' => 'Tutorid',
            'subjectid' => 'Subjectid',
            'cousreid' => 'Cousreid',
            'topicid' => 'Topicid',
            'type' => 'Type',
            'location' => 'Location',
            'state' => 'State',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Tutor::className(), ['tutorid' => 'tutorid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['subjectid' => 'subjectid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCousre()
    {
        return $this->hasOne(Course::className(), ['courseid' => 'cousreid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['topicid' => 'topicid']);
    }
}
