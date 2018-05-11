<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(['action' => ['course1']]); ?>

    <?= $form->field($model, 'courseid')->textInput() ?>
   
    <?= $form->field($model, 'coursename')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model,'file',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Upload Image"]
                                                                   ])->fileInput(); ?>
    

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
