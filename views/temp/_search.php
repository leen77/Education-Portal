<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TempSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tempid') ?>

    <?= $form->field($model, 'courseid') ?>

    <?= $form->field($model, 'topicname') ?>

    <?= $form->field($model, 'pdf') ?>

    <?= $form->field($model, 'video') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
