<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "enroll".
 *
 * @property integer $enrollid
 * @property integer $tempid
 * @property integer $userid
 * @property integer $likes
 *
 * @property Temp $temp
 * @property Userdb $user
 */
class Enroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enroll';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tempid', 'userid'], 'required'],
            [['tempid', 'userid','tlikes'], 'integer'],
            [['tempid'], 'exist', 'skipOnError' => true, 'targetClass' => Temp::className(), 'targetAttribute' => ['tempid' => 'tempid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Userdb::className(), 'targetAttribute' => ['userid' => 'userid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enrollid' => 'Enrollid',
            'tempid' => 'Tempid',
            'userid' => 'Userid',
            //'likes' => 'Likes',
            'tlikes'=>'TLikes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemp()
    {
        return $this->hasOne(Temp::className(), ['tempid' => 'tempid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userdb::className(), ['userid' => 'userid']);
    }
}
