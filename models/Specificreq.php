<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "specificreq".
 *
 * @property integer $specificid
 * @property integer $requestid
 * @property integer $tutorid
 *
 * @property Request $request
 * @property Tutor $tutor
 */
class Specificreq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specificreq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requestid', 'tutorid'], 'required'],
            [['requestid', 'tutorid'], 'integer'],
            [['requestid'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['requestid' => 'requestid']],
            [['tutorid'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['tutorid' => 'tutorid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'specificid' => 'Specificid',
            'requestid' => 'Requestid',
            'tutorid' => 'Tutorid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['requestid' => 'requestid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Tutor::className(), ['tutorid' => 'tutorid']);
    }
}
