<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property integer $id
 * @property integer $temp_id
 * @property string $qtext
 * @property string $op1
 * @property string $op2
 * @property string $op3
 * @property string $op4
 * @property string $ansop
 *
 * @property Temp $temp
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * @inheritdoc
     */
    public $option;
    public $hidden1;
    public $hidden2;

    public function rules()
    {
        return [
            [['tempid', 'qtext', 'op1', 'op2', 'op3', 'op4','quizno'], 'required'],
            [['tempid','quizno'], 'integer'],
            [['qtext', 'ansop'], 'string'],
            [['op1', 'op2', 'op3', 'op4'], 'string', 'max' => 200],
            [['tempid'], 'exist', 'skipOnError' => true, 'targetClass' => Temp::className(), 'targetAttribute' => ['tempid' => 'tempid']],
            [['option'],'safe'],
             [['hidden1'],'safe'],
              [['hidden2'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'quizno' =>'Quiz No',
            'tempid' => 'Topic Name',
            'qtext' => 'Qtext',
            'op1' => 'Op1',
            'op2' => 'Op2',
            'op3' => 'Op3',
            'op4' => 'Op4',
            'ansop' => 'Ansop',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemp()
    {
        return $this->hasOne(Temp::className(), ['tempid' => 'tempid']);
    }
}
