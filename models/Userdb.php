<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "userdb".
 *
 * @property integer $userid
 * @property string $password
 * @property string $name
 * @property string $dob
 * @property string $email
 * @property string $mobile
 * @property string $university
 * @property integer $roleid
 * @property string $imgfile
 *
 * @property Admintemp[] $admintemps
 * @property Comment[] $comments
 * @property Enroll[] $enrolls
 * @property Temp[] $temps
 * @property Role $role
 */
class Userdb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userdb';
    }

    /**
     * @inheritdoc
     */
    public $captcha;
    public $confirmpwd;
    public $file;

    public function rules()
    {
        return [
            [['password', 'name', 'email', 'mobile', 'roleid', 'file'], 'required'],
            [['roleid'], 'integer'],
            [['password', 'name',  'email'], 'string', 'max' => 50],
          //   [['password'],'string','min'=> 8,'max'=>16],
            ['password','match','pattern'=>'/^[a-zA-Z0-9]{8,}$/','message'=>Yii::t('app','Must be atleast 8 digit and alphanumeric')],
            [['mobile'], 'string', 'max' => 15],
            [['university'], 'string', 'max' => 100],
            [['imgfile'], 'string', 'max' => 200],
            [['email'],'email'],
             [['email'],'unique'],
            [['roleid'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['roleid' => 'roleid']],
            ['captcha','captcha'],
            ['confirmpwd','compare','compareAttribute'=>'password'],
            [['file'],'file'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'password' => 'Password',
            'name' => 'Name',
      //      'dob' => 'Dob',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'university' => 'University',
            'roleid' => 'Roleid',
            'file' => 'Upload Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmintemps()
    {
        return $this->hasMany(Admintemp::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrolls()
    {
        return $this->hasMany(Enroll::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemps()
    {
        return $this->hasMany(Temp::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['roleid' => 'roleid']);
    }
}
