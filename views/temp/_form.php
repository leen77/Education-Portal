<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Temp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'courseid')->textInput() ?>

    <?= $form->field($model, 'topicname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
