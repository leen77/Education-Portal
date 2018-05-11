<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $accountid
 * @property integer $userid
 * @property string $accountno
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public $hidden4;

    public function rules()
    {
        return [
            [['userid', 'accountno'], 'required'],
            [['userid'], 'integer'],
            [['accountno'], 'string', 'max' => 20],
            [['hidden4'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accountid' => 'Accountid',
            'userid' => 'Userid',
            'accountno' => 'Accountno',
        ];
    }
}
