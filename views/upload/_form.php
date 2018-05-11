<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Uploads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uploads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uploadid')->textInput() ?>

    <?= $form->field($model, 'tutorid')->textInput() ?>

    <?= $form->field($model, 'subjectid')->textInput() ?>

    <?= $form->field($model, 'cousreid')->textInput() ?>

    <?= $form->field($model, 'topicid')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
