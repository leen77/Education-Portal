<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property integer $roleid
 * @property string $rolename
 *
 * @property Logindb[] $logindbs
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleid', 'rolename'], 'required'],
            [['roleid'], 'integer'],
            [['rolename'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleid' => 'Roleid',
            'rolename' => 'Rolename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogindbs()
    {
        return $this->hasMany(Logindb::className(), ['roleid' => 'roleid']);
    }
}
