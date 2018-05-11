<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "admintemp".
 *
 * @property integer $atempid
 * @property integer $courseid
 * @property integer $userid
 * @property string $topicname
 * @property string $pdf
 * @property string $video
 *
 * @property Course $course
 * @property Userdb $user
 */
class Admintemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admintemp';
    }

    /**
     * @inheritdoc
     */
    public $file;
    public $file1;

    public function rules()
    {
        return [
            [['courseid', 'userid', 'topicname', 'pdf', 'video'], 'required'],
            [['courseid', 'userid'], 'integer'],
            [['topicname', 'pdf', 'video'], 'string', 'max' => 200],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'courseid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Userdb::className(), 'targetAttribute' => ['userid' => 'userid']],
             [['file'],'file','maxFiles'=>10,'extensions'=>'pdf','maxSize'=>1024*1024*50,'tooBig'=>'File has to be smaller than 50MB,'],
             [['file1'],'file','maxFiles'=>10,'extensions'=>'mp4,pdf','maxSize'=>1024*1024*50,'tooBig'=>'File has to be smaller than 50MB,'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atempid' => 'Atempid',
            'courseid' => 'Courseid',
            'userid' => 'Userid',
            'topicname' => 'Topicname',
            'pdf' => 'Pdf',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userdb::className(), ['userid' => 'userid']);
    }
}
