<?php

namespace frontend\models;

use Yii;
use frontend\models\Userdb;

/**
 * This is the model class for table "logindb".
 *
 * @property integer $loginid
 * @property string $userid
 * @property string $password
 * @property integer $roleid
 *
 * @property Userdb $user
 * @property Role $role
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logindb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'password', 'roleid'], 'required'],
            [['roleid'], 'integer'],
            [['userid'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 20],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Userdb::className(), 'targetAttribute' => ['userid' => 'userid']],
            [['roleid'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['roleid' => 'roleid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loginid' => 'Loginid',
            'userid' => 'Userid',
            'password' => 'Password',
            'roleid' => 'Roleid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userdb::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['roleid' => 'roleid']);
    }
}
