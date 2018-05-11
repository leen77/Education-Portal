<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $requestid
 * @property string $coursesubject
 * @property string $coursedetails
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc

     */
    public $hidden1;
    public $hidden2;
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public $hidden4;
    public function rules()
    {
        return [
            [['coursesubject'], 'required'],
            [['coursedetails'], 'string'],
            [['coursesubject'], 'string', 'max' => 100],
             [['requestedon'], 'safe'],
            [['hidden1'],'safe'],
            [['hidden2'],'safe'],
            [['hidden4'],'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'requestid' => 'Requestid',
            'coursesubject' => 'Coursesubject',
            'coursedetails' => 'Coursedetails',
        ];
    }
}
