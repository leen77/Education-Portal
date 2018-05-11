<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Temp;
/* @var $this yii\web\View */
/* @var $model frontend\models\Quiz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quizno')->textInput(['style'=>'width:250px']) ?>  

    <?= $form->field($model,'tempid')->dropDownList(ArrayHelper::map(Temp::find()->all(),'tempid','topicname'),['prompt'=>'Select topic'])?>

    <?= $form->field($model, 'qtext')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'op1')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'op2')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'op3')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'op4')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'ansop')->dropDownList([ 'A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', ], ['prompt' => 'Correct option']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
