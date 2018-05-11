<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\QuizSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'temp_id') ?>

    <?= $form->field($model, 'qtext') ?>

    <?= $form->field($model, 'op1') ?>

    <?= $form->field($model, 'op2') ?>

    <?php // echo $form->field($model, 'op3') ?>

    <?php // echo $form->field($model, 'op4') ?>

    <?php // echo $form->field($model, 'ansop') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
