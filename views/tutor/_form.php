<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tutor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tutorid')->textInput() ?>

    <?= $form->field($model, 'tutorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailtut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobiletut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accno')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
