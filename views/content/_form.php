<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contentid')->textInput() ?>

    <?= $form->field($model, 'contentname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'courseid')->textInput() ?>

    <?= $form->field($model, 'topicid')->textInput() ?>

    <?= $form->field($model, 'tutorid')->textInput() ?>

    <?= $form->field($model, 'plocation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vlocation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'likes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
