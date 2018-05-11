<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "temp".
 *
 * @property integer $tempid
 * @property integer $courseid
 * @property integer $userid
 * @property string $topicname
 * @property string $pdf
 * @property string $video
 * @property string $status
 * @property integer $likes
 * @property string $uploadedon
 *
 * @property Comment[] $comments
 * @property Enroll[] $enrolls
 * @property Quiz[] $quizzes
 * @property Course $course
 * @property Userdb $user
 */
class Temp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp';
    }

    /**
     * @inheritdoc
     */

    public $file;
    public $file1;
    public $hidden3;

    public function rules()
    {
        return [
            [['courseid', 'userid', 'topicname', 'pdf'], 'required'],
            [['courseid', 'userid', 'likes'], 'integer'],
            [['uploadedon'], 'safe'],
            [['topicname', 'pdf', 'video'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 50],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'courseid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Userdb::className(), 'targetAttribute' => ['userid' => 'userid']],
             [['file'],'file','maxFiles'=>10,'extensions'=>'pdf','maxSize'=>1024*1024*50,'tooBig'=>'File has to be smaller than 50MB,'],
             [['file1'],'file','maxFiles'=>10,'extensions'=>'mp4','maxSize'=>1024*1024*50,'tooBig'=>'File has to be smaller than 50MB,'],
             [['hidden3'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          //  'tempid' => 'Tempid',
            'courseid' => 'Course',
            //'userid' => 'Userid',
            'topicname' => 'Topicname',
            'file' => 'Pdf',
            'file1' => 'Video',
            //'status' => 'Status',
            //'likes' => 'Likes',
            //'uploadedon' => 'Uploadedon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['tempid' => 'tempid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrolls()
    {
        return $this->hasMany(Enroll::className(), ['tempid' => 'tempid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizzes()
    {
        return $this->hasMany(Quiz::className(), ['tempid' => 'tempid']);
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
    public function getUser()
    {
        return $this->hasOne(Userdb::className(), ['userid' => 'userid']);
    }
}
