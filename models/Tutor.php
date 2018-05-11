<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property integer $tutorid
 * @property integer $userid
 * @property string $tutorname
 *
 * @property Specificreq[] $specificreqs
 * @property Userdb $user
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'tutorname'], 'required'],
            [['userid'], 'integer'],
            [['tutorname'], 'string', 'max' => 200],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Userdb::className(), 'targetAttribute' => ['userid' => 'userid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tutorid' => 'Tutorid',
            'userid' => 'Userid',
            'tutorname' => 'Tutorname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecificreqs()
    {
        return $this->hasMany(Specificreq::className(), ['tutorid' => 'tutorid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userdb::className(), ['userid' => 'userid']);
    }
}
