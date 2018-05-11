<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $commentid
 * @property integer $tempid
 * @property string $commentinfo
 * @property integer $userid
 *
 * @property Temp $temp
 * @property Userdb $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public $hidden3;
    
    public function rules()
    {
        return [
            [['tempid', 'commentinfo', 'userid'], 'required'],
            [['tempid', 'userid'], 'integer'],
            [['commentinfo'], 'string'],
            [['tempid'], 'exist', 'skipOnError' => true, 'targetClass' => Temp::className(), 'targetAttribute' => ['tempid' => 'tempid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Userdb::className(), 'targetAttribute' => ['userid' => 'userid']],
            [['hidden3'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           // 'commentid' => 'Commentid',
            '//tempid' => 'Tempid',
            'commentinfo' => '',
            //'userid' => 'Userid',
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
